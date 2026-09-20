<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚨 New Order #{{ $order->order_number }}</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f5f7; font-family:'Helvetica Neue', Arial, sans-serif; color:#1e293b; line-height:1.6;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#f4f5f7; padding:30px 10px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:600px; background-color:#ffffff; border-radius:14px; overflow:hidden; border:2px solid #0f172a; box-shadow:0 8px 24px rgba(0,0,0,0.08);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color:#090a0d; padding:22px 30px; border-bottom:3px solid #df7239;">
                            <table role="presentation" width="100%">
                                <tr>
                                    <td>
                                        <span style="font-size:22px; font-weight:900; color:#ffffff;">
                                            TAB<span style="color:#fafe21;">STICK</span> <span style="font-size:12px; color:#94a3b8; font-weight:700; letter-spacing:1px;">ADMIN ALERT</span>
                                        </span>
                                    </td>
                                    <td align="right">
                                        <span style="display:inline-block; background-color:#df7239; color:#ffffff; font-size:11px; font-weight:900; padding:4px 10px; border-radius:6px; letter-spacing:1px;">
                                            NEW ORDER
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px;">
                            <h2 style="margin:0 0 8px; font-size:20px; font-weight:900; color:#0f172a;">
                                📦 New Customer Order Placed!
                            </h2>
                            <p style="margin:0 0 20px; color:#64748b; font-size:14px;">
                                A new order has been received on the Tabstick storefront. Details are below:
                            </p>

                            <!-- Customer Quick Summary -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="10" style="background-color:#f8fafc; border:1px solid #e2e8f0; border-radius:10px; margin-bottom:20px; font-size:14px;">
                                <tr>
                                    <td width="50%" style="border-bottom:1px solid #e2e8f0;">
                                        <span style="color:#64748b; font-size:11px; font-weight:700; text-transform:uppercase;">Order Number</span><br>
                                        <strong style="color:#0f172a; font-size:15px; font-family:monospace;">#{{ $order->order_number }}</strong>
                                    </td>
                                    <td width="50%" style="border-bottom:1px solid #e2e8f0;">
                                        <span style="color:#64748b; font-size:11px; font-weight:700; text-transform:uppercase;">Order Amount</span><br>
                                        <strong style="color:#dc2626; font-size:16px;">Rs. {{ number_format($order->total, 2) }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-bottom:1px solid #e2e8f0;">
                                        <span style="color:#64748b; font-size:11px; font-weight:700; text-transform:uppercase;">Customer</span><br>
                                        <strong style="color:#0f172a;">{{ $order->customer_name }}</strong>
                                    </td>
                                    <td style="border-bottom:1px solid #e2e8f0;">
                                        <span style="color:#64748b; font-size:11px; font-weight:700; text-transform:uppercase;">Phone</span><br>
                                        <a href="tel:{{ $order->phone }}" style="color:#2563eb; font-weight:700; text-decoration:none;">{{ $order->phone }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="color:#64748b; font-size:11px; font-weight:700; text-transform:uppercase;">Customer Email</span><br>
                                        <a href="mailto:{{ $order->email }}" style="color:#2563eb; text-decoration:none;">{{ $order->email }}</a>
                                    </td>
                                    <td>
                                        <span style="color:#64748b; font-size:11px; font-weight:700; text-transform:uppercase;">Payment Mode</span><br>
                                        <strong style="color:{{ $order->payment_status === 'paid' ? '#166534' : '#854d0e' }};">
                                            {{ $order->payment_method === 'cod' ? '💵 Cash on Delivery' : '⚡ Razorpay (Paid)' }}
                                        </strong>
                                    </td>
                                </tr>
                            </table>

                            <!-- Shipping Address -->
                            <div style="background-color:#eff6ff; border:1px solid #bfdbfe; border-radius:10px; padding:14px; margin-bottom:20px; font-size:13px; color:#1e40af;">
                                <strong style="display:block; margin-bottom:4px; font-size:14px;">🚚 Delivery Address:</strong>
                                {{ $order->customer_name }}<br>
                                {{ $order->address }}<br>
                                {{ $order->city }}, {{ $order->state }} - {{ $order->postal_code }}
                            </div>

                            <!-- Items List -->
                            <h4 style="margin:0 0 10px; font-size:14px; text-transform:uppercase; color:#475569; letter-spacing:0.5px;">
                                Items to Pack ({{ $order->items->sum('quantity') }}):
                            </h4>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="8" style="border-collapse:collapse; margin-bottom:24px; font-size:13px;">
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr style="border-bottom:1px solid #f1f5f9;">
                                            <td>• <strong>{{ $item->product_name }}</strong></td>
                                            <td style="text-align:center; font-weight:700;">Qty: {{ $item->quantity }}</td>
                                            <td style="text-align:right; font-weight:700;">Rs. {{ number_format($item->line_total, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- CTA to Admin Panel -->
                            <div style="text-align:center; margin-top:24px;">
                                <a href="{{ route('admin.orders.show', $order) }}" style="display:inline-block; background-color:#0f172a; color:#fafe21; font-weight:800; font-size:14px; text-decoration:none; padding:14px 28px; border-radius:8px; border:2px solid #0f172a;">
                                    View &amp; Fulfill in Admin Panel →
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f8fafc; padding:16px 30px; text-align:center; color:#94a3b8; font-size:12px; border-top:1px solid #e2e8f0;">
                            Tabstick Automated Order Dispatch Alert
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
