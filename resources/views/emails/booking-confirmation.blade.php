<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation - MSuites Hotel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .header {
            text-align: center;
            background-color: #0e4a7f;
            padding: 20px;
        }

        .header img {
            max-width: 150px;
            height: auto;
        }

        .content {
            padding: 25px;
        }

        h2 {
            color: #0e4a7f;
        }

        p {
            font-size: 15px;
            line-height: 1.6;
            margin: 6px 0;
        }

        .details {
            background-color: #f3f4f6;
            padding: 15px;
            border-radius: 6px;
            margin: 15px 0;
        }

        .footer {
            text-align: center;
            font-size: 13px;
            color: #777;
            padding: 15px;
            border-top: 1px solid #e5e7eb;
        }

        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
            }

            .content {
                padding: 15px;
            }

            .header img {
                max-width: 120px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- ✅ Header with MSuites Logo -->
        <div class="header">
            <img src="{{ asset('images/MSUITES LOGO.png') }}" alt="MSuites Hotel Logo">
        </div>

        <!-- ✅ Email Content -->
        <div class="content">
            <h2>Dear {{ $booking->name }},</h2>

            <p>Thank you for booking with <strong>MSuites Hotel</strong>! We’re delighted to confirm your reservation.</p>

            <div class="details">
                <p><b>Room Type:</b> {{ $booking->room_type}}</p>
                <p><b>Check-in Date:</b> {{ \Carbon\Carbon::parse($booking->check_in)->format('F j, Y') }}</p>
                <p><b>Check-out Date:</b> {{ \Carbon\Carbon::parse($booking->check_out)->format('F j, Y') }}</p>
                <p><b>Check-in Time:</b> {{ $booking->check_in_time }}</p>
                <p><b>Check-out Time:</b> {{ $booking->check_out_time }}</p>
                <p><b>Guests:</b> {{ $booking->guests }}</p>
            </div>

            <p>We look forward to welcoming you soon. If you have any questions or special requests, please contact us anytime.</p>

            <br>
            <p>Best regards,</p>
            <p><strong>MSuites Hotel Team</strong></p>
        </div>

        <!-- ✅ Footer -->
        <div class="footer">
            © {{ date('Y') }} MSuites Hotel. All rights reserved.
        </div>
    </div>
</body>
</html>
