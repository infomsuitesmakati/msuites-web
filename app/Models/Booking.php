<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\BookingConfirmedMail;
use App\Models\Room;

class Booking extends Model
{
    protected $fillable = [
        'name', 'email', 'check_in', 'check_out', 'guests', 'room_id',
    ];

    // Relationship with Room
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id'); // ✅ explicitly set foreign key
    }

    // Automatically send email after creation
    protected static function booted()
{
    static::created(function ($booking) {
        try {
            Mail::to($booking->email)->queue(new BookingConfirmedMail($booking)); // ✅ queue instead of send
        } catch (\Exception $e) {
            Log::error('Booking confirmation email failed: ' . $e->getMessage());
        }
    });
}

}
