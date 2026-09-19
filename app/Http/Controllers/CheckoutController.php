<?php

namespace App\Http\Controllers;

use App\Mail\AdminNewOrderMail;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\StockMovement;
use App\Services\RazorpayGateway;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Razorpay\Api\Errors\Error as RazorpayError;
use Throwable;

class CheckoutController extends Controller
{
    public function create(Request $request): View|RedirectResponse
    {
        $summary = $this->summary($request);
        return $summary['items']->isEmpty()
            ? redirect()->route('cart.index')->with('error', 'Your cart is empty.')
            : view('store.checkout', $summary);
    }

    public function store(Request $request): View|RedirectResponse
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:100', 'email' => 'required|email|max:150',
            'phone' => 'required|string|max:20', 'address' => 'required|string|max:500',
            'city' => 'required|string|max:80', 'state' => 'required|string|max:80',
            'postal_code' => 'required|string|max:12', 'payment_method' => 'required|in:cod,razorpay',
        ]);
        if ($data['payment_method'] === 'razorpay' && (! config('services.razorpay.key') || ! config('services.razorpay.secret'))) {
            return back()->withInput()->with('error', 'Online payment is not configured yet. Please choose COD.');
        }
        $cart = $request->session()->get('cart', []);
        if ($cart === []) return redirect()->route('cart.index')->with('error', 'Your cart is empty.');

        $order = DB::transaction(function () use ($cart, $data, $request) {
            $products = Product::whereIn('id', array_keys($cart))->where('is_active', true)->lockForUpdate()->get()->keyBy('id');
            $subtotal = 0;
            foreach ($cart as $productId => $quantity) {
                $product = $products->get($productId);
                abort_unless($product && $quantity > 0 && $product->stock >= $quantity, 422, 'A cart item is unavailable or out of stock.');
                $subtotal += $product->price * $quantity;
            }
            $shipping = $subtotal >= 499 ? 0 : 49;
            $order = Order::create([...$data, 'user_id' => $request->user()?->id, 'order_number' => 'TS-'.strtoupper(Str::random(10)),
                'subtotal' => $subtotal, 'shipping' => $shipping, 'total' => $subtotal + $shipping,
                'payment_status' => $data['payment_method'] === 'cod' ? 'cod_pending' : 'pending']);
            foreach ($cart as $productId => $quantity) {
                $product = $products->get($productId);
                $order->items()->create(['product_id' => $product->id, 'product_name' => $product->name,
                    'unit_price' => $product->price, 'quantity' => $quantity, 'line_total' => $product->price * $quantity]);
                $product->decrement('stock', $quantity);
                StockMovement::create(['product_id' => $product->id, 'quantity_change' => -$quantity,
                    'stock_after' => $product->stock, 'reason' => 'Checkout '.$order->order_number]);
            }
            return $order->load('items');
        });

        if ($order->payment_method === 'cod') {
            $request->session()->forget('cart');
            $this->sendOrderEmails($order);
            return redirect()->route('orders.success', $order);
        }
        return view('store.payment', compact('order'));
    }

    public function createRazorpayOrder(Request $request, RazorpayGateway $razorpay): JsonResponse
    {
        if (! config('services.razorpay.key') || ! config('services.razorpay.secret')) {
            return response()->json(['message' => 'Razorpay credentials are not configured.'], 401);
        }

        $validator = validator($request->all(), [
            'amount' => 'required|integer|min:100',
            'receipt' => 'required|string|exists:orders,order_number',
            'currency' => 'required|string|size:3',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid Razorpay order request.', 'errors' => $validator->errors()], 400);
        }
        $data = $validator->validated();
        $order = Order::where('order_number', $data['receipt'])->firstOrFail();
        if ($order->payment_method !== 'razorpay' || $order->payment_status !== 'pending') {
            return response()->json(['message' => 'This order is not available for Razorpay payment.'], 400);
        }

        $amount = (int) round($order->total * 100);
        if ($amount < 100 || $data['amount'] !== $amount) {
            return response()->json(['message' => 'Razorpay amount mismatch.'], 400);
        }
        $currency = strtoupper($data['currency']);

        if ($order->razorpay_order_id) {
            return response()->json(['order_id' => $order->razorpay_order_id, 'amount' => $amount, 'currency' => $currency]);
        }

        try {
            $paymentOrder = $razorpay->createOrder([
                'amount' => $amount,
                'currency' => $currency,
                'receipt' => $order->order_number,
                'notes' => [
                    'order_number' => $order->order_number,
                    'customer_email' => $order->email,
                ],
            ]);
        } catch (RazorpayError $exception) {
            report($exception);
            $status = str_contains(strtolower($exception->getMessage()), 'auth') ? 401 : 500;
            return response()->json(['message' => 'Razorpay order creation failed.'], $status);
        } catch (Throwable $exception) {
            report($exception);
            return response()->json(['message' => 'Razorpay order creation failed.'], 500);
        }

        $order->update(['razorpay_order_id' => $paymentOrder['id']]);

        return response()->json([
            'order_id' => $paymentOrder['id'],
            'amount' => $paymentOrder['amount'] ?? $amount,
            'currency' => $paymentOrder['currency'] ?? $currency,
        ]);
    }

    public function verifyRazorpayPayment(Request $request): JsonResponse
    {
        $validator = validator($request->all(), [
            'razorpay_order_id' => 'required|string',
            'razorpay_payment_id' => 'required|string',
            'razorpay_signature' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Missing Razorpay payment fields.', 'errors' => $validator->errors()], 400);
        }
        $data = $validator->validated();
        $order = Order::where('razorpay_order_id', $data['razorpay_order_id'])->first();
        if (! $order || $order->payment_method !== 'razorpay' || $order->payment_status !== 'pending') {
            return response()->json(['message' => 'Payment order mismatch.'], 400);
        }
        $expected = hash_hmac('sha256', $order->razorpay_order_id.'|'.$data['razorpay_payment_id'], config('services.razorpay.secret'));
        if (! hash_equals($expected, $data['razorpay_signature'])) {
            return response()->json(['message' => 'Payment verification failed.'], 400);
        }
        $order->update([
            'razorpay_payment_id' => $data['razorpay_payment_id'],
            'razorpay_signature' => $data['razorpay_signature'],
            'payment_status' => 'paid',
        ]);
        $request->session()->forget('cart');
        $this->sendOrderEmails($order);

        return response()->json(['success' => true, 'redirect_url' => route('orders.success', $order)]);
    }

    public function success(Order $order): View { return view('store.success', compact('order')); }

    private function summary(Request $request): array
    {
        $cart = $request->session()->get('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');
        $items = collect($cart)->map(fn ($quantity, $id) => $products->has($id)
            ? ['product' => $products->get($id), 'quantity' => $quantity, 'line_total' => $products->get($id)->price * $quantity] : null)->filter()->values();
        $subtotal = $items->sum('line_total');
        $shipping = $subtotal >= 499 || $subtotal === 0 ? 0 : 49;
        return compact('items', 'subtotal', 'shipping') + ['total' => $subtotal + $shipping];
    }

    private function cancelFailedOrder(Order $order): void
    {
        DB::transaction(function () use ($order) {
            foreach ($order->items as $item) {
                $product = Product::whereKey($item->product_id)->lockForUpdate()->first();
                if (! $product) continue;
                $product->increment('stock', $item->quantity);
                StockMovement::create(['product_id' => $product->id, 'quantity_change' => $item->quantity,
                    'stock_after' => $product->stock, 'reason' => 'Payment start failed '.$order->order_number]);
            }
            $order->delete();
        });
    }

    protected function sendOrderEmails(Order $order): void
    {
        try {
            $order->loadMissing('items.product');

            // 1. Send confirmation email to customer
            if (filter_var($order->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($order->email)->send(new OrderConfirmationMail($order));
            }

            // 2. Send new order alert to store owner / admin
            $adminEmail = config('mail.from.address', 'maayankmalhotra095@gmail.com');
            if (filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
                Mail::to($adminEmail)->send(new AdminNewOrderMail($order));
            }
        } catch (\Throwable $e) {
            report($e);
            Log::error('Order email sending failed: ' . $e->getMessage(), [
                'order' => $order->order_number,
            ]);
        }
    }
}
