<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Mail\BookingConfirmedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function create()
    {
        return view('bookings.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'check_in'  => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests'    => 'required|integer|min:1',
            'room_id'   => 'required|exists:rooms,id', // assumes you have rooms table
        ]);

        // Save booking
        $booking = Booking::create($validated);

        // Send confirmation email
        Mail::to($booking->email)->send(new BookingConfirmedMail($booking));

        return redirect()->back()->with('success', 'Your booking has been confirmed! A confirmation email has been sent.');
    }
}
