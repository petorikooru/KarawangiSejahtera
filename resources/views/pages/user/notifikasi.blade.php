<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('/images/svg/logo.svg') }}" type="image/x-icon">
    <title>Selamat Datang!</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFBF7] flex min-h-screen">

    <x-sidebars.user
        user="Hilman"
    />
    <x-headerbars.user
        user="Hilman"
        desa="Desa Karawangi"
    />

    <!-- Main Content -->
    <div class="flex-1 mt-16 ml-20">

        <div class="mx-4 sm:mx-8 lg:mx-40 my-6 sm:my-10 p-4 sm:p-6 lg:p-10">
            <h1 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8 text-gray-800">
                Riwayat Notifikasi
            </h1>

            @foreach ($notifications as $notification)
                <div class="p-4 sm:p-5 border border-gray-200 rounded-lg mb-4 shadow-lg bg-white">

                    <!-- Header notif -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">

                        <div class="flex items-center">
                            <button class="text-black hover:text-gray-500 text-lg ml-0 sm:ml-2">
                                &times;
                            </button>
                            <span
                                class="text-xs font-bold px-2 py-1 rounded ml-3
                                {{ $notification->status === 'Baru' ? 'bg-[#5A4634] text-white' : 'bg-[#4F6D46] text-white' }}">
                                {{ $notification->status }}
                            </span>
                        </div>

                        <div class="text-[10px] sm:text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full self-start sm:self-auto">
                            {{ $notification->created_at->format('d F Y \p\u\k\u\l H:i') }} WIB
                        </div>
                    </div>

                    <!-- Body notif -->
                    <div class="mt-2 sm:mx-4">
                        <strong class="block font-semibold text-sm sm:text-base text-gray-900">
                            {{ $notification->title }}
                        </strong>
                        <p class="text-sm text-gray-600 mt-1 leading-relaxed">
                            {{ $notification->message }}
                        </p>
                        <div class="text-red-500 text-xs sm:text-sm mt-1 font-semibold">
                            {{ $notification->from }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <x-footers.home />
    </div>
</body>

</html>
