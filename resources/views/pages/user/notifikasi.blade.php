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
    <div class="flex-1 ml-20 mt-16">

        <div class="mx-40 my-10 p-10">
            <h1 class="text-3xl font-bold mb-8 text-gray-800">Riwayat Notifikasi</h5>

            @foreach ($notifications as $notification)
                <div class="p-4 border border-gray-200 rounded-lg mb-4 shadow-lg">

                    <div class="flex justify-between items-start mb-2">

                        <div class="flex items-center">
                            <button class="text-black hover:text-red-600 text-lg mr-2">&times;</button>
                            <span class="text-xs font-bold px-2 py-1 rounded mx-5
                                {{ $notification->status === 'Baru' ? 'bg-[#5A4634] text-white' : 'bg-[#4F6D46] text-white' }}">
                                {{ $notification->status }}
                            </span>
                        </div>
                        
                        <div class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">
                            {{ $notification->created_at->format('d F Y \p\u\k\u\l H:i') }} WIB
                        </div>
                    </div>

                    <div class="mx-10">
                        <strong class="block font-semibold text-sm text-gray-900">{{ $notification->title }}</strong>
                        <p class="text-sm text-gray-600 mt-1">{{ $notification->message }}</p>
                        <div class="text-red-500 text-xs mt-1 font-semibold">{{ $notification->from }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <x-footers.home />
    </div>
</body>

</html>
