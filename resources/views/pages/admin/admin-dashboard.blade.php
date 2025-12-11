<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('/images/svg/logo.svg') }}" type="image/x-icon">
    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        /* Definisi warna gradient yang konsisten */
        .admin-text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-image: linear-gradient(to right, #4F46E5, #1D4ED8); /* Warna biru/ungu yang lebih dominan untuk admin */
        }
        .admin-bg-gradient {
            background-image: linear-gradient(to right, #4F46E5, #1D4ED8);
        }
    </style>
</head>

<body class="bg-[#FDFBF7] flex min-h-screen">

    <x-sidebars.admin
        user="Admin Desa"
        :menu-data='[
            {"title": "Dashboard", "icon": "bxs-dashboard", "url": "/admin/dashboard", "is_main_dashboard": true},
            {"title": "Kelola Pelatihan", "icon": "bx-group", "url": "/admin/pelatihan", "sub_menus": [{"title": "Daftar Pelatihan", "url": "/admin/pelatihan/list"}, {"title": "Tambah Pelatihan Baru", "url": "/admin/pelatihan/create"}, {"title": "Lihat Peserta", "url": "/admin/pelatihan/peserta"}]},
            {"title": "Kelola Bantuan UMKM", "icon": "bx-store", "url": "/admin/umkm", "sub_menus": [{"title": "Daftar Pengajuan", "url": "/admin/umkm/list"}, {"title": "Update Status Pengajuan", "url": "/admin/umkm/update-status"}]},
            {"title": "Kelola Berita", "icon": "bx-news", "url": "/admin/berita", "sub_menus": [{"title": "Daftar Berita", "url": "/admin/berita/list"}, {"title": "Buat Berita Baru", "url": "/admin/berita/create"}]},
            {"title": "Manajemen User", "icon": "bx-user-pin", "url": "/admin/users", "sub_menus": [{"title": "Daftar Semua User", "url": "/admin/users/list"}]}
        ]'
    />
    
    <x-headerbars.admin
        user="Admin Desa"
        desa="Desa Karawangi"
    />

    <div class="flex-1 ml-20 mt-4 sm:mt-8 md:mt-16 p-4 sm:p-8 md:p-12">

        <div class="mb-10">
            <h1 class="text-4xl sm:text-5xl font-extrabold admin-text-gradient bg-gradient-to-r">
                Selamat Datang, Admin!
            </h1>
            <p class="text-gray-600 mt-2">Ringkasan cepat status desa saat ini.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            
            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-indigo-500 hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-indigo-500 uppercase">Pelatihan Aktif</p>
                        <h2 class="text-3xl font-bold text-gray-800 mt-1">
                            {{ $jumlahPelatihan ?? 0 }}
                        </h2>
                    </div>
                    <i class='bx bx-group text-4xl text-indigo-400'></i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-green-500 hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-green-500 uppercase">User Terdaftar</p>
                        <h2 class="text-3xl font-bold text-gray-800 mt-1">
                            {{ $jumlahUser ?? 0 }}
                        </h2>
                    </div>
                    <i class='bx bx-user-pin text-4xl text-green-400'></i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-yellow-500 hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-yellow-500 uppercase">UMKM Pending</p>
                        <h2 class="text-3xl font-bold text-gray-800 mt-1">
                            {{ $jumlahPengajuanUmkm ?? 0 }}
                        </h2>
                    </div>
                    <i class='bx bx-time-five text-4xl text-yellow-400'></i>
                </div>
            </div>

        </div>

        <section id="latest-activities" class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-2xl font-semibold text-gray-700 border-b pb-3 mb-4">Aktivitas Terbaru</h2>
            
            <p class="text-gray-500 italic">... Konten dinamis seperti 5 Pengajuan UMKM Terbaru atau Berita Terakhir akan ditampilkan di sini ...</p>
        </section>

        <x-footers.home />
    </div>
</body>

</html>