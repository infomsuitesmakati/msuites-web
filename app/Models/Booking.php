<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'check_in',
        'check_out',
        'check_in_time',
        'check_out_time',
        'room_type',
        'guests',
        'room_id',
    ];

    // Format check-in time (12-hour)
    public function getCheckInTimeAttribute($value)
    {
        return Carbon::parse($value)->format('h:i A');
    }

    // Format check-out time (12-hour)
    public function getCheckOutTimeAttribute($value)
    {
        return Carbon::parse($value)->format('h:i A');
    }
}
