<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Mail\BookingConfirmationMail;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Validate all fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'check_in' => 'required|date',
            'check_in_time' => 'required',
            'check_out' => 'required|date|after_or_equal:check_in',
            'check_out_time' => 'required',
            'guests' => 'required|integer|min:1',
            'room_name' => 'required|string|max:255',
        ]);

        // Store booking
        $booking = Booking::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'check_in' => $validated['check_in'],
            'check_in_time' => $validated['check_in_time'],
            'check_out' => $validated['check_out'],
            'check_out_time' => $validated['check_out_time'],
            'guests' => $validated['guests'],
            'room_type' => $validated['room_name'],
        ]);

        // Send confirmation email
        Mail::to($booking->email)->send(new BookingConfirmationMail($booking));

        // Optionally notify admin
        // Mail::to('info.msuitesmakati@gmail.com')->send(new BookingConfirmationMail($booking));

        return back()->with('success', 'You have successfully booked the ' . $validated['room_name'] . '!');
    }
}
