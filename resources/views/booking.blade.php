<!DOCTYPE html>
<html>
<head>
    <title>Book a Room - MSuites Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Book a Room</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('bookings.store') }}" method="POST" class="card p-4 shadow-sm">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Room Type</label>
                <input type="text" name="room_type" class="form-control" placeholder="e.g. Deluxe Twin" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Check-in Date</label>
                    <input type="date" name="check_in" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Check-out Date</label>
                    <input type="date" name="check_out" class="form-control" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Book Now</button>
        </form>
    </div>
</body>
</html>
