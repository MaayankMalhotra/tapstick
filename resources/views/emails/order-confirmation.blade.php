<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation #{{ $order->order_number }}</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f5f7; font-family:'Helvetica Neue', Arial, sans-serif; color:#1e293b; line-height:1.6;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#f4f5f7; padding:30px 10px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:600px; background-color:#ffffff; border-radius:14px; overflow:hidden; border:2px solid #0f172a; box-shadow:0 8px 24px rgba(0,0,0,0.08);">
                    <!-- Brand Header -->
                    <tr>
                        <td style="background-color:#090a0d; padding:24px 30px; text-align:center; border-bottom:3px solid #fafe21;">
                            <span style="font-size:24px; font-weight:900; color:#ffffff; letter-spacing:1px;">
                                TAB<span style="color:#fafe21;">STICK</span>
                            </span>
                            <span style="display:block; font-size:11px; font-weight:800; color:#94a3b8; letter-spacing:2px; margin-top:4px;">
                                CREATIVE DIE-CUT STICKER STUDIO
                            </span>
                        </td>
                    </tr>

                    <!-- Order Confirmation Hero -->
                    <tr>
                        <td style="padding:32px 30px 20px;">
                            <div style="display:inline-block; background-color:#dcfce7; color:#166534; border:1px solid #86efac; border-radius:999px; padding:4px 14px; font-size:12px; font-weight:800; letter-spacing:1px; margin-bottom:14px;">
                                ✓ ORDER CONFIRMED
                            </div>
                            <h1 style="margin:0 0 10px; font-size:24px; font-weight:900; color:#0f172a;">
                                Thank you, {{ explode(' ', $order->customer_name)[0] }}!
                            </h1>
                            <p style="margin:0 0 20px; color:#475569; font-size:15px;">
                                We've received your order and our team is already prepping your fresh die-cut stickers. Here is your order summary:
                            </p>

                            <!-- Order Meta Box -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="12" style="background-color:#f8fafc; border:1px solid #e2e8f0; border-radius:10px; margin-bottom:24px; font-size:14px;">
                                <tr>
                                    <td width="50%" style="border-bottom:1px solid #e2e8f0;">
                                        <span style="color:#64748b; font-size:12px; font-weight:700; text-transform:uppercase;">Order Number</span><br>
                                        <strong style="color:#0f172a; font-size:15px; font-family:monospace;">#{{ $order->order_number }}</strong>
                                    </td>
                                    <td width="50%" style="border-bottom:1px solid #e2e8f0;">
                                        <span style="color:#64748b; font-size:12px; font-weight:700; text-transform:uppercase;">Order Date</span><br>
                                        <strong style="color:#0f172a;">{{ $order->created_at->format('d M Y') }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="color:#64748b; font-size:12px; font-weight:700; text-transform:uppercase;">Payment Method</span><br>
                                        <strong style="color:#0f172a;">{{ $order->payment_method === 'cod' ? 'Cash on Delivery (COD)' : 'Online via Razorpay' }}</strong>
                                    </td>
                                    <td>
                                        <span style="color:#64748b; font-size:12px; font-weight:700; text-transform:uppercase;">Payment Status</span><br>
                                        <strong style="color:{{ $order->payment_status === 'paid' ? '#166534' : '#854d0e' }};">
                                            {{ $order->payment_status === 'paid' ? '✓ Paid' : ($order->payment_method === 'cod' ? 'Cash on Delivery (Pending)' : 'Payment Pending') }}
                                        </strong>
                                    </td>
                                </tr>
                            </table>

                            <!-- Items Table -->
                            <h3 style="margin:0 0 12px; font-size:16px; font-weight:800; color:#0f172a;">Items in Your Order</h3>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="10" style="border-collapse:collapse; margin-bottom:20px; font-size:14px;">
                                <thead>
                                    <tr style="background-color:#f1f5f9; text-align:left; font-size:12px; color:#475569; text-transform:uppercase;">
                                        <th style="padding:10px 12px; border-radius:6px 0 0 6px;">Sticker</th>
                                        <th style="padding:10px 12px; text-align:center;">Qty</th>
                                        <th style="padding:10px 12px; text-align:right; border-radius:0 6px 6px 0;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr style="border-bottom:1px solid #f1f5f9;">
                                            <td style="padding:12px;">
                                                <strong style="color:#0f172a;">{{ $item->product_name }}</strong>
                                                <span style="display:block; color:#64748b; font-size:12px;">Rs. {{ number_format($item->unit_price, 2) }} each</span>
                                            </td>
                                            <td style="padding:12px; text-align:center; font-weight:700; color:#0f172a;">
                                                × {{ $item->quantity }}
                                            </td>
                                            <td style="padding:12px; text-align:right; font-weight:800; color:#0f172a;">
                                                Rs. {{ number_format($item->line_total, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Totals Box -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="6" style="margin-bottom:24px; font-size:14px;">
                                <tr>
                                    <td style="color:#64748b;">Subtotal:</td>
                                    <td style="text-align:right; font-weight:700; color:#0f172a;">Rs. {{ number_format($order->subtotal, 2) }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#64748b;">Shipping:</td>
                                    <td style="text-align:right; font-weight:700; color:{{ $order->shipping == 0 ? '#166534' : '#0f172a' }};">
                                        {{ $order->shipping > 0 ? 'Rs. ' . number_format($order->shipping, 2) : 'FREE' }}
                                    </td>
                                </tr>
                                <tr style="border-top:2px solid #e2e8f0;">
                                    <td style="padding-top:10px; font-size:17px; font-weight:900; color:#0f172a;">Total Payable:</td>
                                    <td style="padding-top:10px; text-align:right; font-size:18px; font-weight:900; color:#dc2626;">Rs. {{ number_format($order->total, 2) }}</td>
                                </tr>
                            </table>

                            <!-- Delivery Address Box -->
                            <div style="background-color:#eff6ff; border:1px solid #bfdbfe; border-radius:10px; padding:16px; margin-bottom:24px;">
                                <strong style="display:block; color:#1e3a8a; font-size:14px; margin-bottom:6px;">📍 Shipping Address:</strong>
                                <div style="font-size:14px; color:#1e40af; line-height:1.5;">
                                    <strong>{{ $order->customer_name }}</strong><br>
                                    {{ $order->address }}<br>
                                    {{ $order->city }}, {{ $order->state }} - {{ $order->postal_code }}<br>
                                    Phone: {{ $order->phone }}
                                </div>
                            </div>

                            <!-- 48hr Dispatch Notice -->
                            <div style="background-color:#fefce8; border:1px solid #fef08a; border-radius:10px; padding:16px; margin-bottom:10px;">
                                <strong style="display:block; color:#854d0e; font-size:14px; margin-bottom:4px;">🚚 Pan-India 48-Hour Dispatch Guarantee:</strong>
                                <p style="margin:0; font-size:13px; color:#a16207; line-height:1.5;">
                                    Every Tabstick sticker is printed on 100% waterproof vinyl with durable UV-resistant inks. We will dispatch your order within 48 hours and email you tracking updates as soon as it's on the road!
                                </p>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#090a0d; padding:24px 30px; text-align:center; color:#94a3b8; font-size:12px; border-top:1px solid #1e293b;">
                            <p style="margin:0 0 8px; color:#cbd5e1; font-weight:600;">
                                Need assistance with your order? Reply directly to this email or contact us at <a href="mailto:hello@tabstick.in" style="color:#fafe21; text-decoration:none;">hello@tabstick.in</a>.
                            </p>
                            <p style="margin:0; color:#64748b;">
                                © {{ date('Y') }} Tabstick. All rights reserved. Designed &amp; Crafted in India.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
