<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/svg/logo.svg') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') — Karangwangi Sejahtera</title>
</head>
<body class="h-full bg-amber-50 font-sans antialiased">
    <div class="grid min-h-screen lg:grid-cols-2">

        <!-- Left Sidebar (Hero) - Hidden on mobile -->
        <div class="hidden lg:flex lg:flex-col lg:justify-center lg:bg-gradient-to-br lg:from-emerald-800 lg:to-emerald-700 lg:rounded-tr-3xl lg:rounded-br-3xl lg:p-12 xl:p-20">
            <div class="max-w-lg">
                <h1 class="text-5xl xl:text-6xl font-bold text-amber-50 leading-tight">
                    Bersama <span class="text-amber-200">Karangwangi</span><br>
                    Wujudkan Kesejahteraan.
                </h1>
                <p class="mt-6 text-lg xl:text-xl text-amber-100 opacity-95 leading-relaxed">
                    Dapatkan informasi terbaru dan akses berbagai layanan desa dalam satu tempat.
                </p>
            </div>
        </div>

        <!-- Right Form Area -->
        <div class="flex flex-col justify-center items-center p-6 sm:p-10 lg:p-12 xl:p-20 relative">
            <div class="w-full max-w-md space-y-8">

                <!-- Mobile Header (visible only on small screens) -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Karangwangi</h1>
                    <p class="mt-2 text-gray-600">Wujudkan Kesejahteraan Bersama</p>
                </div>

                <!-- Page Title -->
                <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900">
                    @yield('form-title')
                </h2>

                <!-- Progress Indicator (only on register steps) -->
                @if(Route::is('register.step*'))
                    <div class="text-center text-sm text-gray-600">
                        Langkah {{ Route::is('register.step1') ? '1' : '2' }} dari 2
                    </div>
                @endif

                <!-- Form Content -->
                @yield('content')

            </div>

            <!-- Logo (top-right on desktop, bottom on mobile) -->
            <a href="/" class="absolute top-6 right-6 lg:top-10 lg:right-10 opacity-90 hover:opacity-100 transition">
                <img src="{{ asset('images/png/logo.png') }}" alt="Logo Karangwangi" class="h-12 lg:h-16">
            </a>
        </div>
    </div>
</body>
</html>