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
        <!-- Main Section -->
        <div class="text-center mx-20 pt-24">
            <h2 class="text-4xl font-bold text-[#D4A017] py-6">
                Tempat di mana tradisi membimbing langkah dan kebersamaan meneguhkan arah.
            </h2>
            <img src="{{ asset('images/png/sample/user1.png') }}" alt="Image" class="mx-auto w-full h-[800px] object-cover shadow-lg rounded-2xl">
        </div>

        <x-footers.home />
    </div>
</body>

</html>
