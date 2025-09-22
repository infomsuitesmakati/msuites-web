<!DOCTYPE html>
<html>
<head>
    <title>Book a Room</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css') {{-- Tailwind if using Vite --}}
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-4">Book a Room</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('book.store') }}">
            @csrf
            <div class="mb-3">
                <label class="block font-medium">Name</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-3">
                <label class="block font-medium">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-3">
                <label class="block font-medium">Check-in</label>
                <input type="date" name="check_in" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-3">
                <label class="block font-medium">Check-out</label>
                <input type="date" name="check_out" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-3">
                <label class="block font-medium">Guests</label>
                <input type="number" name="guests" min="1" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-3">
                <label class="block font-medium">Room</label>
                <select name="room_id" class="w-full border rounded p-2" required>
                    @foreach(\App\Models\Room::all() as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Confirm Booking
            </button>
        </form>
    </div>
</body>
</html>
