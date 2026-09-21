<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Portfolio Inquiry</title>
</head>
<body style="margin:0; padding:0; background-color:#090D16; font-family:'Segoe UI', -apple-system, BlinkMacSystemFont, Roboto, Helvetica, Arial, sans-serif; color:#F8FAFC; line-height:1.6;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#090D16; padding:30px 10px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:600px; background-color:#0F1422; border-radius:14px; overflow:hidden; border:1px solid #1E293B; box-shadow:0 8px 30px rgba(0,0,0,0.5);">
                    <tr>
                        <td style="background:#141B2D; padding:22px 28px; border-bottom:2px solid #10B981;">
                            <span style="display:inline-block; background:#10B981; color:#090D16; font-weight:900; font-size:10px; letter-spacing:1px; text-transform:uppercase; padding:2px 8px; border-radius:4px; margin-bottom:6px;">
                                🚀 NEW INQUIRY FROM /MAAYANK
                            </span>
                            <h2 style="margin:0; font-size:20px; font-weight:900; color:#FFFFFF;">
                                Inquiry from {{ $inquiry->name }}
                            </h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="8" style="background:#141B2D; border:1px solid #1E293B; border-radius:8px; margin-bottom:20px; font-size:13px;">
                                <tr>
                                    <td width="30%" style="color:#94A3B8; font-weight:700; border-bottom:1px solid #1E293B;">Full Name:</td>
                                    <td style="color:#F8FAFC; font-weight:800; border-bottom:1px solid #1E293B;">{{ $inquiry->name }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#94A3B8; font-weight:700; border-bottom:1px solid #1E293B;">Email Address:</td>
                                    <td style="color:#38BDF8; font-weight:800; border-bottom:1px solid #1E293B;">
                                        <a href="mailto:{{ $inquiry->email }}" style="color:#38BDF8; text-decoration:none;">{{ $inquiry->email }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color:#94A3B8; font-weight:700; border-bottom:1px solid #1E293B;">Phone / WhatsApp:</td>
                                    <td style="color:#F8FAFC; border-bottom:1px solid #1E293B;">
                                        @if($inquiry->phone)
                                            <a href="tel:{{ $inquiry->phone }}" style="color:#10B981; text-decoration:none; font-weight:700;">{{ $inquiry->phone }}</a>
                                        @else
                                            <span style="color:#64748B;">Not provided</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color:#94A3B8; font-weight:700; border-bottom:1px solid #1E293B;">Subject / Topic:</td>
                                    <td style="color:#F8FAFC; border-bottom:1px solid #1E293B;">{{ $inquiry->subject ?: 'Direct Inquiry' }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#94A3B8; font-weight:700;">Received At:</td>
                                    <td style="color:#94A3B8;">{{ $inquiry->created_at?->format('d M Y, h:i A') ?? now()->format('d M Y, h:i A') }} (IP: {{ $inquiry->ip_address }})</td>
                                </tr>
                            </table>

                            <h3 style="margin:0 0 10px; font-size:14px; font-weight:800; color:#F8FAFC;">Message:</h3>
                            <div style="background:#090D16; border:1px solid #1E293B; border-radius:8px; padding:16px; font-size:14px; color:#CBD5E1; line-height:1.7; white-space:pre-wrap;">{{ $inquiry->message }}</div>

                            <div style="margin-top:24px; text-align:center;">
                                <a href="mailto:{{ $inquiry->email }}?subject={{ urlencode('Re: ' . ($inquiry->subject ?: 'Inquiry on /maayank')) }}" style="display:inline-block; background:#38BDF8; color:#090D16; padding:10px 24px; border-radius:8px; font-weight:900; font-size:13px; text-decoration:none;">
                                    Reply Directly to {{ $inquiry->name }} →
                                </a>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
