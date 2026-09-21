<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks for connecting with Maayank Malhotra</title>
</head>
<body style="margin:0; padding:0; background-color:#090D16; font-family:'Segoe UI', -apple-system, BlinkMacSystemFont, Roboto, Helvetica, Arial, sans-serif; color:#F8FAFC; line-height:1.6;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#090D16; padding:40px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:580px; background-color:#0F1422; border-radius:16px; overflow:hidden; border:1px solid #1E293B; box-shadow:0 12px 36px rgba(0,0,0,0.5);">
                    <!-- Tech Header Banner -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #141B2D 0%, #0F1422 100%); padding:28px 32px; border-bottom:1px solid #1E293B;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td>
                                        <div style="display:inline-block; background:#06B6D4; color:#090D16; font-weight:900; font-size:11px; letter-spacing:1.5px; text-transform:uppercase; padding:3px 10px; border-radius:999px; margin-bottom:8px;">
                                            ✦ INQUIRY CONFIRMED
                                        </div>
                                        <h1 style="margin:0; font-size:22px; font-weight:900; color:#FFFFFF; letter-spacing:-0.02em;">
                                            Maayank Malhotra
                                        </h1>
                                        <p style="margin:4px 0 0; font-size:13px; color:#94A3B8;">
                                            Full Stack Software Engineer &amp; Founder @ Tabstick
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Body Content -->
                    <tr>
                        <td style="padding:32px;">
                            @php
                                $rawName = trim($inquiry->name);
                                $displayGreeting = ($rawName && strcasecmp($rawName, 'Portfolio Visitor') !== 0) ? $rawName : 'there';
                            @endphp
                            <p style="margin:0 0 16px; font-size:16px; color:#F8FAFC;">
                                Hi <strong>{{ $displayGreeting }}</strong>,
                            </p>
                            <p style="margin:0 0 20px; font-size:14px; color:#94A3B8; line-height:1.7;">
                                Thank you for connecting through my portfolio (<a href="https://tabstick.in/maayank" style="color:#38BDF8; text-decoration:none;">tabstick.in/maayank</a>). I've received your inquiry regarding <strong style="color:#F8FAFC;">{{ $inquiry->subject ?: 'Engineering & Collaboration' }}</strong>.
                            </p>

                            @if(!empty($aiNote))
                            <!-- Gemini AI Personal Acknowledgement -->
                            <div style="background-color:#17162E; border:1px solid #8B5CF6; border-radius:10px; padding:16px 20px; margin-bottom:24px;">
                                <p style="margin:0 0 6px; font-size:11px; font-weight:800; color:#C4B5FD; text-transform:uppercase; letter-spacing:1px;">
                                    ✨ Executive AI Note (Powered by Google Gemini)
                                </p>
                                <p style="margin:0; font-size:13.5px; color:#E2E8F0; line-height:1.6; font-style:italic;">
                                    "{{ $aiNote }}"
                                </p>
                            </div>
                            @endif

                            <!-- Official Resume Attached Callout Card -->
                            <div style="background-color:#0B1C2D; border:1px solid #0284C7; border-radius:10px; padding:18px 20px; margin-bottom:24px;">
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <td width="36" valign="top" style="font-size:24px; line-height:1;">
                                            📎
                                        </td>
                                        <td>
                                            <p style="margin:0 0 4px; font-size:14px; font-weight:800; color:#38BDF8;">
                                                Official Resume Attached (PDF)
                                            </p>
                                            <p style="margin:0 0 10px; font-size:13px; color:#CBD5E1; line-height:1.5;">
                                                As requested, I have attached a copy of my official CV (<strong>Maayank_Malhotra_Resume.pdf</strong>) directly to this email for your review.
                                            </p>
                                            <a href="https://tabstick.in/maayank/resume" style="display:inline-block; background-color:#0284C7; color:#FFFFFF; font-size:12px; font-weight:700; text-decoration:none; padding:6px 14px; border-radius:6px;">
                                                ⬇ Download Direct PDF Copy
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <p style="margin:0 0 24px; font-size:14px; color:#94A3B8; line-height:1.7;">
                                I personally review all technical inquiries, consulting requests, and full-stack engineering opportunities. I will get back to you within <strong>24 hours</strong>.
                            </p>

                            <!-- User's Message Copy -->
                            <div style="background-color:#141B2D; border:1px solid #1E293B; border-left:3px solid #06B6D4; border-radius:8px; padding:16px 20px; margin-bottom:28px;">
                                <span style="display:block; font-size:11px; font-weight:800; color:#64748B; text-transform:uppercase; letter-spacing:1px; margin-bottom:6px;">
                                    Your Submitted Message
                                </span>
                                <p style="margin:0; font-size:13px; color:#CBD5E1; font-style:italic; white-space:pre-wrap; line-height:1.6;">"{{ $inquiry->message }}"</p>
                            </div>

                            <!-- Direct Contact Shortcuts -->
                            <div style="border-top:1px solid #1E293B; padding-top:24px; margin-top:24px;">
                                <p style="margin:0 0 14px; font-size:13px; font-weight:700; color:#F8FAFC;">
                                    Need an urgent response or direct chat?
                                </p>
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <td style="padding:4px 0;">
                                            <span style="font-size:13px; color:#94A3B8;">📞 Phone / WhatsApp:</span>
                                            <a href="https://wa.me/918799730966" style="font-size:13px; color:#10B981; font-weight:700; text-decoration:none; margin-left:6px;">+91 8799730966 ↗</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:4px 0;">
                                            <span style="font-size:13px; color:#94A3B8;">✉️ Direct Email:</span>
                                            <a href="mailto:maayankmalhotra095@gmail.com" style="font-size:13px; color:#38BDF8; font-weight:700; text-decoration:none; margin-left:6px;">maayankmalhotra095@gmail.com</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:4px 0;">
                                            <span style="font-size:13px; color:#94A3B8;">💼 LinkedIn:</span>
                                            <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" style="font-size:13px; color:#38BDF8; font-weight:700; text-decoration:none; margin-left:6px;">linkedin.com/in/maayank-malhotra ↗</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:4px 0;">
                                            <span style="font-size:13px; color:#94A3B8;">💻 GitHub:</span>
                                            <a href="https://github.com/MaayankMalhotra" style="font-size:13px; color:#38BDF8; font-weight:700; text-decoration:none; margin-left:6px;">github.com/MaayankMalhotra ↗</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Signature -->
                            <div style="margin-top:32px; padding-top:20px; border-top:1px solid #1E293B;">
                                <p style="margin:0; font-size:14px; color:#F8FAFC; font-weight:700;">
                                    Maayank Malhotra
                                </p>
                                <p style="margin:2px 0 0; font-size:12px; color:#64748B;">
                                    Full Stack Software Engineer • Founder @ Tabstick<br>
                                    Delhi NCR, India
                                </p>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#070A12; padding:18px 32px; text-align:center; border-top:1px solid #1E293B; font-size:11px; color:#64748B;">
                            This is an automated confirmation sent to {{ $inquiry->email }} from <a href="https://tabstick.in/maayank" style="color:#94A3B8; text-decoration:none;">tabstick.in/maayank</a>.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
