@component('mail::message')
# New Booking Notification

A new booking has been made:

- **Name:** {{ $booking->name }}
- **Email:** {{ $booking->email }}
- **Check-in:** {{ $booking->check_in }}
- **Check-out:** {{ $booking->check_out }}
- **Guests:** {{ $booking->guests }}

Please prepare accordingly.
@endcomponent
