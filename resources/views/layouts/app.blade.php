<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSUITES Hotel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/carousel.js') }}"></script>

    <link rel="icon" type="image/png" sizes="180x180" href="{{ asset ('images/MSUITES LOGO.png')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- HEADER -->
    <header class="shadow">
        <div class="container mx-auto flex justify-between items-center p-4">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/MSUITES LOGO.png') }}" alt="MSUITES Logo" class="h-20 w-auto">
                <h1 class="text-2xl font-bold text-white">MSUITES Hotel</h1>
            </div>
             <!-- Navigation -->
        <nav x-data="{ open: false }" class="relative">
            <!-- Desktop Menu -->
            <ul class="hidden md:flex gap-6">
                <li><a href="{{ route('home') }}" class="hover:text-indigo-400">Home</a></li>
                <li><a href="{{ route('accommodations') }}" class="hover:text-indigo-400">Accommodations</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-indigo-400">Contact Us</a></li>
            </ul>

            <!-- Hamburger Button (visible on mobile) -->
            <button @click="open = !open" class="md:hidden flex flex-col gap-2 focus:outline-none">
                <span class="block w-6 h-0.5 bg-white"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
            </button>

            <!-- Mobile Menu -->
            <div 
                x-show="open" 
                x-transition 
                class="absolute right-0 mt-3 w-40 bg-gray-800 rounded-lg shadow-lg md:hidden z-50"
                @click.away="open = false"
            >
                <ul class="flex flex-col p-3 space-y-2">
                    <li><a href="{{ route('home') }}" class="block hover:text-indigo-400">Home</a></li>
                    <li><a href="{{ route('accommodations') }}" class="block hover:text-indigo-400">Accommodations</a></li>
                    <li><a href="{{ route('contact') }}" class="block hover:text-indigo-400">Contact Us</a></li>
                </ul>
            </div>
            </nav>  
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 pt-10 pb-6 mt-10">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-6">

            <!-- About -->
            <div>
                <h3 class="text-lg font-bold text-white mb-3">About Us</h3>
                <p class="text-sm">
                    MSuites hotel offers comfortable rooms, friendly service, and a convenient stay.
                    Enjoy a relaxing atmosphere with practical amenities designed to 
                    make your visit pleasant and hassle-free.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-bold text-white mb-3">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-indigo-400">Home</a></li>
                    <li><a href="{{ route('accommodations') }}" class="hover:text-indigo-400">Accommodations</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-indigo-400">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-bold text-white mb-3">Contact Info</h3>
                <p class="text-sm">📍 1015 Metropolitan Ave, 1203 Makati City, Metro Manila</p>
                <p class="text-sm">📞 808-4012</p>
                <p class="text-sm">📧 info.msuitesmakati@gmail.com</p>
                <div class="flex gap-4 mt-3">
                    <a href="https://www.segoviagroup.com/" class="hover:text-indigo-800">🌐</a>
                    <a href="https://www.facebook.com/msuiteshotelofficial" target="_blank" class="hover:text-indigo-600 transition">
                        <svg class="w-4 h-5 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 5 3.657 9.128 8.438 9.878v-6.99H8.077v-2.888h2.361V9.845c0-2.337 1.396-3.63 3.532-3.63.996 0 2.034.177 2.034.177v2.24h-1.146c-1.13 0-1.482.704-1.482 1.428v1.713h2.523l-.403 2.888h-2.12v6.99C18.343 21.128 22 17 22 12z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/msuiteshotelofficial/" target="_blank"class="hover:text-pink-500 transition">
                        <!-- Instagram Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-5 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 
                                    7.75v8.5A5.75 5.75 0 0 1 16.25 
                                    22h-8.5A5.75 5.75 0 0 1 2 
                                    16.25v-8.5A5.75 5.75 0 0 1 7.75 
                                    2zm0 1.5A4.25 4.25 0 0 0 3.5 
                                    7.75v8.5A4.25 4.25 0 0 0 7.75 
                                    20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 
                                    4.25 0 0 0 16.25 3.5h-8.5zm4.25 
                                    3a5.75 5.75 0 1 1 0 11.5 5.75 
                                    5.75 0 0 1 0-11.5zm0 1.5a4.25 
                                    4.25 0 1 0 0 8.5 4.25 4.25 
                                    0 0 0 0-8.5zm5-1.25a.75.75 
                                    0 1 1 0 1.5.75.75 0 0 1 0-1.5z"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        <!-- Bottom Footer -->
        <div class="text-center text-gray-500 text-sm mt-6 border-t border-gray-700 pt-4">
            &copy; {{ date('Y') }} MSuites Hotel. All rights reserved.
        </div>
    </footer>

</body>
</html>