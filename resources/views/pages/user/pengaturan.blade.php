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

    <x-sidebars.user user="Hilman" icon="images/png/sample/user1.png"/>
    <x-headerbars.user user="Hilman" desa="Desa Karawangi" />

    <!-- Main Content -->
    <div class="flex-1 ml-20 mt-16">

        <div class="my-10 p-4 sm:p-10">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-6 sm:mb-8 text-gray-800 mx-4 sm:mx-8 lg:ml-60 text-center sm:text-left">
                Profil User
            </h1>

            <div class="mx-auto p-6 bg-white rounded-xl shadow-lg max-w-6xl w-full">

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div class="flex flex-col items-center text-center">
                        <div class="w-full flex justify-center mb-4">
                            <img src="{{ asset('images/png/sample/user1.png') }}"
                                 alt="Profile"
                                 class="w-40 h-40 sm:w-56 sm:h-56 rounded-full border-2 border-gray-300 object-cover">
                        </div>

                        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">{{ $namalengkap }}</h2>
                        <p class="text-sm text-gray-600">{{ $gender }}</p>
                    </div>

                    <div class="grid grid-cols-1 gap-4 text-center sm:text-left">
                        <div>
                            <p class="text-sm text-gray-600">Tanggal Lahir</p>
                            <p class="text-gray-800">{{ $tanggallahir }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-600">Alamat</p>
                            <p class="text-gray-800">{{ $alamat }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-600">No. Telp</p>
                            <p class="text-gray-800">{{ $nomortelepon }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-600">Alamat Email</p>
                            <p class="text-gray-800">{{ $email }}</p>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-6 flex flex-col sm:flex-row gap-3 justify-center">
                            <button class="bg-blue-400 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                                Edit Profile Anda
                            </button>
                            <button class="bg-yellow-600 text-white py-2 px-4 rounded-full hover:bg-yellow-400">
                                Ganti Password
                            </button>
                            <button class="bg-red-400 text-white py-2 px-4 rounded-full hover:bg-red-600">
                                Hapus Akun
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <x-footers.home />
    </div>

    <!-- Tailwind CSS Responsive Fixes -->
    <style>
        @media (max-width: 768px) {
            .lg\:ml-20 {
                margin-left: 0 !important;
            }
            .sm\:mx-10 {
                margin-left: 2rem !important;
                margin-right: 2rem !important;
            }
            .lg\:mx-20 {
                margin-left: 1rem !important;
                margin-right: 1rem !important;
            }
            .max-w-6xl {
                max-width: 100% !important;
            }
        }
    </style>
</body>

</html>
