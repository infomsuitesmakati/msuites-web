@extends('layouts.app')

@section('content')
<section class="room-details container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">

    <!-- Carousel -->
    <div 
        x-data="{
            current: 0,
            slides: {{ Js::from(array_map(fn($img) => asset($img), $room['images'])) }},
            next() { this.current = (this.current + 1) % this.slides.length },
            prev() { this.current = (this.current - 1 + this.slides.length) % this.slides.length }
        }"
        class="relative w-full h-80 md:h-96 rounded-lg shadow-md overflow-hidden"
    >
        <template x-for="(src, index) in slides" :key="index">
            <div x-show="current === index" class="absolute inset-0">
                <img :src="src" class="w-full h-full object-cover" alt="Room image">
            </div>
        </template>

        <button @click="prev" class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 text-white p-2 rounded-full hover:bg-black/70 transition">❮</button>
        <button @click="next" class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 text-white p-2 rounded-full hover:bg-black/70 transition">❯</button>

        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex space-x-2">
            <template x-for="(src, index) in slides" :key="index">
                <button 
                    @click="current = index"
                    :class="current === index ? 'bg-white' : 'bg-gray-400'"
                    class="w-3 h-3 rounded-full transition"
                ></button>
            </template>
        </div>
    </div>

    <!-- Room Info + Booking Form -->
    <div class="room-info">
        <h2 class="text-2xl font-semibold mb-3">{{ $room['name'] }}</h2>
        <p class="text-gray-700 mb-5">{{ $room['description'] }}</p>

        <h3 class="text-xl font-semibold mb-2">Amenities</h3>
        <ul class="list-disc list-inside mb-5 text-gray-700">
            @foreach($room['amenities'] as $amenity)
                <li>✔ {{ $amenity }}</li>
            @endforeach
        </ul>

        <!-- Booking Form -->
        <div class="mt-8 p-6 bg-gray-100 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-4">Book This Room</h3>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('bookings.store') }}" method="POST" class="space-y-4">
                @csrf

                <input type="hidden" name="room_name" value="{{ $room['name'] }}">

                <div>
                    <label class="block mb-1 font-medium">Full Name</label>
                    <input type="text" name="name" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 p-2" required>
                </div>

                <div>
                    <label class="block mb-1 font-medium">Email</label>
                    <input type="email" name="email" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 p-2" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 font-medium">Check-in Date</label>
                        <input type="date" name="check_in" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 p-2" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Check-out Date</label>
                        <input type="date" name="check_out" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 p-2" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 font-medium">Check-in Time</label>
                        <input type="time" name="check_in_time" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 p-2" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Check-out Time</label>
                        <input type="time" name="check_out_time" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 p-2" required>
                    </div>
                </div>

                <div>
                    <label class="block mb-1 font-medium">Guests</label>
                    <input type="number" name="guests" min="1" value="1" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 p-2" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                    Confirm Booking
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
