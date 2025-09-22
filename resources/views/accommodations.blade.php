@extends('layouts.app')

@section('content')
<section class="accommodations container">
    <h2 class="text-3xl font-bold mb-8 text-center">Unit Rooms</h2>
    <div class="room-list">
        
        <!-- Standard Room -->
        <a href="{{ url('/rooms/1') }}" class="room-card">
            <img src="{{ asset('images/Rooms/standard.jpg') }}" alt="Standard Room">
            <h3>Standard Room</h3>
            <!--<p>Spacious and elegant with a queen-sized bed and city view.</p> -->
        </a>

        <a href="{{ url('/rooms/4') }}" class="room-card">
            <img src="{{ asset('images/Rooms/standard-twin.jpg') }}" alt="Standard Twin Bedroom">
            <h3>Standard Twin Bed Room</h3>
            <!--<p>Spacious and elegant with a queen-sized bed and city view.</p> -->
        </a>

        <!-- Deluxe Room -->
        <a href="{{ url('/rooms/2') }}" class="room-card">
            <img src="{{ asset('images/Rooms/deluxe/deluxe-room.jpg') }}" alt="Deluxe Room">
            <h3>Deluxe Room</h3>
            <!--<p>Perfect for business travelers with private lounge access.</p>-->
        </a>
        
        <a href="{{ url('/rooms/5') }}" class="room-card">
            <img src="{{ asset('images/Rooms/deluxe-twin.jpg') }}" alt="Deluxe Twin Bed Room">
            <h3>Deluxe Twin Bed Room</h3>
            <!--<p>Spacious and elegant with a king-sized bed and city view.</p> -->
        </a>

        <!-- Family Room -->
        <a href="{{ url('/rooms/3') }}" class="room-card">
            <img src="{{ asset('images/Rooms/family-room.jpg')}}" alt="Family Room">
            <h3>Family Room</h3>
            <!--<p>Ultimate luxury with personal butler and private pool.</p>-->
        </a>
    </div>
</section>
@endsection