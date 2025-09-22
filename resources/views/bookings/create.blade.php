<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Room - MSuites Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-2xl p-8">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Book a Room</h1>

        {{-- ✅ Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- ✅ Validation Errors --}}
        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bookings.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Name --}}
            <div>
                <label class="block text-gray-700 font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300" required>
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300" required>
            </div>

            {{-- Check-In --}}
            <div>
                <label class="block text-gray-700 font-medium">Check-In</label>
                <input type="date" name="check_in" value="{{ old('check_in') }}"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300" required>
            </div>

            {{-- Check-Out --}}
            <div>
                <label class="block text-gray-700 font-medium">Check-Out</label>
                <input type="date" name="check_out" value="{{ old('check_out') }}"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300" required>
            </div>

            {{-- Guests --}}
            <div>
                <label class="block text-gray-700 font-medium">Guests</label>
                <input type="number" name="guests" min="1" value="{{ old('guests') }}"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300" required>
            </div>

            {{-- Room --}}
            <div>
                <label class="block text-gray-700 font-medium">Room</label>
                <select name="room_id"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300" required>
                    <option value="">-- Select a Room --</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                            {{ $room->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Submit Button --}}
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
                Confirm Booking
            </button>
        </form>
    </div>
</body>
</html>
