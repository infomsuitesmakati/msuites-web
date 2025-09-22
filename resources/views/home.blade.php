@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section 
    x-data="carousel()" 
    x-init="startAutoSlide()" 
    class="relative w-full h-[90vh] overflow-hidden">

    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="currentSlide === index"
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 translate-x-10"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition ease-in duration-700"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 -translate-x-10"
             class="absolute inset-0 w-full h-full">

            <img :src="slide.image" class="w-full h-full object-cover brightness-60">

            <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-6">
                <h2 class="text-4xl md:text-5xl font-bold mb-4" x-text="slide.title"></h2>
                <p class="text-lg md:text-xl mb-6" x-text="slide.text"></p>
                <a href="{{ url('/accommodations') }}" 
                   class="bg-indigo-600 hover:bg-indigo-600/70 text-white px-6 py-3 rounded-lg shadow-lg">
                   View Rooms
                </a>
            </div>
        </div>
    </template>

    <!-- Prev Button -->
    <button @click="prevSlide"
            class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-3 rounded-full">
        ❮
    </button>

    <!-- Next Button -->
    <button @click="nextSlide"
            class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-3 rounded-full">
        ❯
    </button>

    <!-- Dots -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-2">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="goToSlide(index)" 
                    :class="{'bg-white': currentSlide === index, 'bg-gray-500': currentSlide !== index}"
                    class="w-3 h-3 rounded-full"></button>
        </template>
    </div>
</section>

<!-- About Section -->
<section class="about container py-12 text-center">
    <h2 class="text-3xl font-bold mb-6">About MSUITES</h2>
    <p class="max-w-2xl mx-auto text-lg">
        At MSUITES Hotel, we redefine hospitality with a blend of elegance and warmth.
        Ideally located in the heart of the city, we offer comfortable rooms,
        modern amenities, and exceptional service to make your stay truly unforgettable.
    </p>
</section>

<!-- Featured Rooms -->
<section class="featured container py-12 text-center">
    <h2 class="text-3xl font-bold mb-8">Featured Accommodations</h2>
    <div class="room-grid grid md:grid-cols-3 gap-8">
        <div class="room-card">
            <img src="{{ asset('images/Rooms/standard.jpg') }}" alt="Standard Room">
            <h3 class="text-xl font-semibold mt-4">Standard Room</h3>
            <p>A cost-effective choice that prioritizes ease and comfort.</p>
        </div>
        <div class="room-card">
            <img src="{{ asset('images/Rooms/deluxe/deluxe-room.jpg') }}" alt="Deluxe Room">
            <h3 class="text-xl font-semibold mt-4">Deluxe Room</h3>
            <p>Perfect for tourists or couples, with extra space and modern facilities.</p>
        </div>
        <div class="room-card">
            <img src="{{ asset('images/Rooms/family-room.jpg') }}" alt="Family Room">
            <h3 class="text-xl font-semibold mt-4">Family Room</h3>
            <p>Spacious and fully equipped for families to enjoy comfort together.</p>
        </div>
    </div>
</section>

<!-- Services -->
<section class="services container py-12 text-center">
    <h2 class="text-3xl font-bold mb-8">Our Services</h2>
    <div class="services-grid grid md:grid-cols-3 gap-8">
        <div class="service-card">
            <i class="fas fa-concierge-bell text-3xl text-yellow-500 mb-4"></i>
            <h3 class="text-xl font-semibold">Reception Services</h3>
            <p>Always ready to assist guests’ needs and ensure a pleasant stay.</p>
        </div>
        <div class="service-card">
            <i class="fas fa-shield-alt text-3xl text-yellow-500 mb-4"></i>
            <h3 class="text-xl font-semibold">Safety & Security</h3>
            <p>Reliable security measures for guest safety and peace of mind.</p>
        </div>
        <div class="service-card">
            <i class="fas fa-broom text-3xl text-yellow-500 mb-4"></i>
            <h3 class="text-xl font-semibold">Cleaning Services</h3>
            <p>Maintaining clean and comfortable rooms for every guest.</p>
        </div>
    </div>
</section>

@endsection
