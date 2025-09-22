@component('mail::message')
# Booking Confirmation ✅

Hello **{{ $booking->name }}**,

Your booking has been successfully confirmed at **MSuites Hotel**.

**Room:** {{ $booking->room->name ?? 'N/A' }}  
**Check-in:** {{ \Carbon\Carbon::parse($booking->check_in)->toFormattedDateString() }}  
**Check-out:** {{ \Carbon\Carbon::parse($booking->check_out)->toFormattedDateString() }}  
**Guests:** {{ $booking->guests }}

We look forward to welcoming you soon 🏨✨

Thanks,  
{{ config('app.name') }}
@endcomponent
