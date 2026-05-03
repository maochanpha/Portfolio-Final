<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Portfolio Message</title>
</head>
<body style="margin:0; background:#f5f1ea; font-family:Arial, Helvetica, sans-serif; color:#1f2937;">
    <div style="max-width:680px; margin:0 auto; padding:32px 20px;">
        <div style="background:#ffffff; border-radius:24px; padding:32px; box-shadow:0 18px 48px rgba(15, 23, 42, 0.08);">
            <p style="margin:0 0 12px; font-size:12px; letter-spacing:0.12em; text-transform:uppercase; color:#b45309; font-weight:700;">
                New Contact Message
            </p>

            <h1 style="margin:0 0 24px; font-size:28px; line-height:1.2; color:#111827;">
                Someone contacted you from your portfolio.
            </h1>

            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse; margin-bottom:24px;">
                <tr>
                    <td style="padding:12px 0; border-bottom:1px solid #e5e7eb; width:140px; font-weight:700;">Name</td>
                    <td style="padding:12px 0; border-bottom:1px solid #e5e7eb;">{{ $contact->name }}</td>
                </tr>
                <tr>
                    <td style="padding:12px 0; border-bottom:1px solid #e5e7eb; width:140px; font-weight:700;">Email</td>
                    <td style="padding:12px 0; border-bottom:1px solid #e5e7eb;">
                        <a href="mailto:{{ $contact->email }}" style="color:#b45309; text-decoration:none;">{{ $contact->email }}</a>
                    </td>
                </tr>
                <tr>
                    <td style="padding:12px 0; border-bottom:1px solid #e5e7eb; width:140px; font-weight:700;">Subject</td>
                    <td style="padding:12px 0; border-bottom:1px solid #e5e7eb;">{{ $contact->subject }}</td>
                </tr>
            </table>

            <div style="padding:20px; border-radius:18px; background:#f9fafb; border:1px solid #e5e7eb;">
                <p style="margin:0 0 10px; font-weight:700; color:#111827;">Message</p>
                <p style="margin:0; line-height:1.7; white-space:pre-line; color:#4b5563;">{{ $contact->message }}</p>
            </div>

            <div style="margin-top:24px;">
                <a href="mailto:{{ $contact->email }}?subject=Re:%20{{ rawurlencode($contact->subject) }}" style="display:inline-block; padding:12px 18px; border-radius:999px; background:#111827; color:#ffffff; text-decoration:none; font-weight:700;">
                    Reply in Gmail
                </a>
            </div>
        </div>
    </div>
</body>
</html>
