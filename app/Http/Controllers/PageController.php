<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show a single room details page
     */
    public function roomDetails($id)
    {
        $rooms = config('rooms');
        abort_unless(isset($rooms[$id]), 404);

        return view('room-details', [
            'room' => $rooms[$id],
        ]);
    }

    /**
     * Show contact page
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Show homepage
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Show accommodations page
     */
    public function accommodations()
    {
        return view('accommodations', [
            'rooms' => config('rooms'),
        ]);
    }
}
