@component('mail::message')
# Booking Confirmation

Hello **{{ $booking->name }}**,

Thank you for booking with **MSuites Hotel**!  
Here are your booking details:

@component('mail::panel')
- **Room ID:** {{ $booking->room_id }}
- **Check-in:** {{ \Carbon\Carbon::parse($booking->check_in)->format('F j, Y') }}
- **Check-out:** {{ \Carbon\Carbon::parse($booking->check_out)->format('F j, Y') }}
- **Guests:** {{ $booking->guests }}
@endcomponent

We’re excited to host you and make your stay comfortable.  
If you have any questions, feel free to reply to this email.

@component('mail::button', ['url' => url('/')])
Visit Our Website
@endcomponent

Thanks,<br>
**MSuites Hotel**
@endcomponent
