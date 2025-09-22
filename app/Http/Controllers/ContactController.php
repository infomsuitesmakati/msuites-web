<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // validate inputs
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // Example: send email (make sure mail config is set in .env)
        Mail::raw($validated['message'], function ($msg) use ($validated) {
            $msg->to('info.msuitesmakati@gmail.com')
                ->subject('New Contact Message from ' . $validated['name'])
                ->replyTo($validated['email']);
        });

        // Redirect back with success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
