@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6">All Bookings</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 bg-white rounded-lg shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Check-in</th>
                    <th class="px-4 py-2 border">Check-out</th>
                    <th class="px-4 py-2 border">Guests</th>
                    <th class="px-4 py-2 border">Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td class="px-4 py-2 border">{{ $booking->id }}</td>
                        <td class="px-4 py-2 border">{{ $booking->name }}</td>
                        <td class="px-4 py-2 border">{{ $booking->email }}</td>
                        <td class="px-4 py-2 border">{{ $booking->check_in }}</td>
                        <td class="px-4 py-2 border">{{ $booking->check_out }}</td>
                        <td class="px-4 py-2 border">{{ $booking->guests }}</td>
                        <td class="px-4 py-2 border">{{ $booking->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-2 border text-center">No bookings yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
