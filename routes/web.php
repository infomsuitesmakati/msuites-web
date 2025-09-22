<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/accommodations', [PageController::class, 'accommodations'])->name('accommodations');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Rooms
Route::get('/rooms/{id}', [PageController::class, 'roomDetails'])->name('rooms.details');

// Booking
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
//bookroom
Route::get('/book-room', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/book-room', [BookingController::class, 'store'])->name('bookings.store');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
