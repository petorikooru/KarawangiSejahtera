<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('/images/svg/logo.svg') }}" type="image/x-icon">
    <title>Karsa : Karawangi Sejahtera</title>

    <!-- ChartJs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <!-- Swiper Carousel -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen">

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        @include('components.headerbars.home')
    </header>

    <!-- Section 1: Hero Section -->
    <section class="h-screen bg-cover relative"
        style="background-image: url('{{ asset('images/png/BackgroundHome.png') }}');
               background-position: center 40%;
               background-size: cover;
               background-attachment: fixed;
               position: relative;">
        <div class="flex flex-col items-center text-center justify-center w-full h-full px-4">
            <p class="text-5xl sm:text-7xl lg:text-9xl font-bold mb-1 bg-clip-text text-transparent bg-gradient-to-b from-[#E3B765] to-[#7D6538] py-4">Selamat Datang</p>
            <p class="text-3xl sm:text-4xl font-semibold mb-12">Di Situs Resmi Desa Karawangi Sejahtera</p>
            <p class="text-base sm:text-lg leading-loose mx-auto mb-25">Mewujudkan masyarakat Karawangi yang mandiri, sejahtera, dan terus berkembang</p>
        </div>
    </section>

    <!-- Section 2: Introduction to Desa Karawangi Sejahtera -->
    <section class="bg-gradient-to-b from-[#FFFFFF] to-[#FDFBF7] py-12">
        <div class="container mx-auto px-6 lg:px-20 max-w-screen-xl">
            <div class="flex items-center space-x-4 mb-6">
                <x-bi-newspaper class="w-14 h-14 text-[#E3B765]" />
                <h2 class="text-4xl sm:text-6xl font-bold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-[#E3B765] to-[#7D6538] py-5">
                    Desa Karawangi Sejahtera
                </h2>
            </div>
            <p class="text-lg sm:text-xl font-normal mb-6 pb-6">
                Karangwangi Sejahtera adalah platform desa yang memudahkan Anda mengakses informasi, program, dan layanan desa dalam satu tempat. Platform ini mendukung keterbukaan dan partisipasi warga.
            </p>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Chart Penduduk -->
                <div class="bg-white p-6 rounded-lg shadow-2xl flex flex-col justify-between">
                    <h3 class="text-2xl font-semibold text-center mb-6">Jumlah Penduduk</h3>
                    <div class="flex-grow flex items-end">
                        <canvas id="chartPopulasi" class="w-full h-[250px] sm:h-72"></canvas>
                    </div>
                </div>
                <!-- Chart Gender -->
                <div class="bg-white p-6 rounded-lg shadow-2xl">
                    <h3 class="text-2xl font-semibold text-center mb-6">Jumlah Gender</h3>
                    <canvas id="chartGender" class="w-full h-[300px] sm:h-72"></canvas>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Desa Sejarah -->
    <section class="min-h-[75vh] bg-[#FDFBF7] flex items-center justify-center py-24">
        <div class="bg-white p-12 rounded-lg shadow-xl w-full sm:w-3/4 md:w-5/6 lg:w-10/13 flex flex-col xl:flex-row">
            <!-- Text Section -->
            <div class="w-full xl:w-1/2 pr-6 mb-6 lg:mb-0">
                <h2 class="text-4xl sm:text-5xl xl:text-6xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#E3B765] to-[#7D6538] mb-6 py-10">Sejarah Desa Karawangi Sejahtera</h2>
                <p class="text-lg sm:text-xl text-gray-700 text-justify">
                    Desa Karangwangi Sejahtera berdiri dari komunitas warga yang hidup dari pertanian dan usaha kecil.
                    Desa ini tumbuh lewat kerja sama warga yang terus membangun fasilitas, layanan publik, dan kegiatan sosial.
                    Perkembangan teknologi mendorong desa membuat layanan digital agar informasi, program, dan pelayanan desa lebih mudah diakses semua warga.
                </p>
            </div>
            <!-- Image Section -->
            <div class="w-full md:w-1/2 flex items-center justify-center">
                <img src="{{ url('/images/png/logo.png') }}" alt="Logo" class="w-full max-w-[500px]">
            </div>
        </div>
    </section>

    <!-- Section 4: Berita Terkini -->
    <section class="bg-[#FDFBF7] py-12">
        <div class="flex items-center space-x-4 h-min px-6 xl:px-60 ">
            <x-bi-newspaper class="w-14 h-14 text-[#E3B765]" />
            <h1 class="text-4xl lg:text-6xl font-bold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-[#E3B765] to-[#7D6538] py-12">
                Berita Terkini
            </h1>
        </div>

        <div class="md:w-full lg:w-full xl:w-3/4 mx-auto flex flex-col lg:flex-row justify-between lg:space-x-5 space-y-5 lg:space-y-0">
            <!-- MainNews Component -->
            <x-cards.news-main
                image="{{ asset('images/png/sample/home1.png') }}"
                title="Program Pertanian: Pengenalan Pupuk Organik Bersama Penyuluh Lapangan Kecamatan"
                description="Pada 22 Juli 2025, Desa Karangwangi mengadakan pengenalan pupuk organik bersama penyuluh Kecamatan Sukamaju. Petani menerima penjelasan singkat tentang manfaat dan cara penggunaan pupuk organik untuk meningkatkan hasil panen."
                link=""
            />

            <!-- News Items -->
            <div class="w-full lg:w-3/7 flex flex-col space-y-4">
                <x-cards.news-sub
                    image="{{ asset('images/png/sample/home2.png') }}"
                    title="Literasi Digital: Pemanfaatan Aplikasi Layanan Desa"
                    date="25 Oktober 2025"
                    link="/"
                />
                <x-cards.news-sub
                    image="{{ asset('images/png/sample/home3.png') }}"
                    title="Bimbingan Teknis UMKM: Cara Mengurus NIB dan Perizinan Online"
                    date="20 Januari 2025"
                    link="/"
                />
                <x-cards.news-sub
                    image="{{ asset('images/png/sample/home4.png') }}"
                    title="Seminar Keamanan Desa: Sistem Siskamling Baru"
                    date="12 Januari 2025"
                    link=""
                />
                <button class="mt-6 bg-[#D4A017] text-white py-2 px-6 rounded-lg mx-5">Lihat Berita Selengkapnya</button>
            </div>
        </div>
    </section>

    <!-- Section 5: Carousel Section -->
    <section class="bg-[#FDFBF7] py-16">
        <div class="flex items-center space-x-4 h-min px-6 lg:px-60 ">
            <x-mdi-information class="w-14 h-14 text-[#E3B765]" />
            <h1 class="text-4xl sm:text-6xl font-bold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-[#E3B765] to-[#7D6538] py-12">
                Informasi Kegiatan Desa
            </h1>
        </div>

        <div class="carousel w-full">
            <div class="carousel-images">
                <img src="{{ asset('images/png/sample/home5.png') }}" alt="Activity Image 1" class="carousel-image">
                <img src="{{ asset('images/png/sample/home6.png') }}" alt="Activity Image 2" class="carousel-image">
                <img src="{{ asset('images/png/sample/home7.png') }}" alt="Activity Image 3" class="carousel-image">
                <img src="{{ asset('images/png/sample/home8.png') }}" alt="Activity Image 4" class="carousel-image">
            </div>
        </div>
    </section>

    <!-- Section 6: Desa Bersuara -->
    <section class="bg-[#FDFBF7] py-16">
        <!-- Title and Description -->
        <div class="flex items-center space-x-4 h-min px-6 lg:px-60 ">
            <x-iconoir-sound-high-solid class="w-14 h-14 text-[#E3B765]" />
            <h1 class="text-4xl sm:text-6xl font-bold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-[#E3B765] to-[#7D6538] py-5">
                Desa Bersuara
            </h1>
        </div>

        <h2 class="text-2xl sm:text-4xl text-gradient bg-clip-text text-transparent bg-gradient-to-r from-[#E3B765] to-[#7D6538] py-5 px-6 lg:px-60 ">
            Ruang Aspirasi dan Informasi Warga Karangwangi
        </h2>

        <p class="text-lg sm:text-xl font-normal mb-6 pb-6 px-6 lg:px-60 ">
            Ruang Aspirasi dan Informasi Warga Karawangi.
            Desa Bersuara membantu Anda menyampaikan aspirasi, melihat informasi desa, dan mengikuti perkembangan program secara lebih mudah.
            Semua dibuat agar warga lebih terlibat dan tahu apa yang berjalan di desa.
        </p>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mx-4 sm:mx-12 lg:mx-20">
            <!-- Card 1: Sampaikan Aspirasi Online -->
            <x-cards.home-card
                icon="{{ asset('images/png/icons/mail.png') }}"
                title="Sampaikan Aspirasi Online"
                description="Kirimkan masukan, keluhan, atau usulan langsung melalui platform digital."
            />

            <!-- Card 2: Pantau Tindak Lanjut -->
            <x-cards.home-card
                icon="{{ asset('images/png/icons/download.png') }}"
                title="Pantau Tindak Lanjut"
                description="Lihat perkembangan aspirasi Anda secara real-time sampai selesai diproses."
            />

            <!-- Card 3: Transparansi Informasi -->
            <x-cards.home-card
                icon="{{ asset('images/png/icons/window.png') }}"
                title="Transparansi Informasi"
                description="Akses informasi desa dengan jelas. Program, kegiatan, dan keputusan selalu diperbarui."
            />

            <!-- Card 4: Partisipasi Warga Lebih Mudah -->
            <x-cards.home-card
                icon="{{ asset('images/png/icons/people.png') }}"
                title="Partisipasi Warga Lebih Mudah"
                description="Ikut serta dalam pembangunan desa melalui fitur respons, voting, dan diskusi sederhana."
            />
        </div>
    </section>

    <!-- Section 7: Cara Mengisi Desa Bersuara -->
    <section class="bg-[#FDFBF7] py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20">
            <!-- Title and Description -->
            <div class="text-left mb-12">
                <h2 class="text-4xl font-bold text-[#D4A017] mb-4">Cara Mengisi Desa Bersuara</h2>
                <p class="text-xl text-gray-700 max-w-2xl">
                    Langkah-langkah mudah untuk menyampaikan aspirasi dan informasi desa secara digital, langsung dari genggaman Anda.
                </p>
            </div>

            <!-- Content Container with Step-by-Step Guide on the Left and Login Form on the Right -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Step-by-Step Guide (Left Side) -->
                <div class="space-y-6">
                    <!-- Step 1 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-[#D4A017] text-white rounded-full w-10 h-10 flex items-center justify-center">
                            <span class="text-2xl font-bold">1</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-[#8B4513] mb-2">Daftar dan Login</h3>
                            <p class="text-gray-700">Masuk atau buat akun untuk mulai menyampaikan aspirasi.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-[#D4A017] text-white rounded-full w-10 h-10 flex items-center justify-center">
                            <span class="text-2xl font-bold">2</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-[#8B4513] mb-2">Pilih Jenis Aspirasi</h3>
                            <p class="text-gray-700">Pilih kategori seperti layanan, lingkungan, pembangunan, atau usulan umum.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-[#D4A017] text-white rounded-full w-10 h-10 flex items-center justify-center">
                            <span class="text-2xl font-bold">3</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-[#8B4513] mb-2">Isi Form Aspirasi</h3>
                            <p class="text-gray-700">Tulis keluhan, masukan, atau usulan dengan jelas agar mudah diproses.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 bg-[#D4A017] text-white rounded-full w-10 h-10 flex items-center justify-center">
                            <span class="text-2xl font-bold">4</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-[#8B4513] mb-2">Pantau Tindak Lanjut</h3>
                            <p class="text-gray-700">Lihat perkembangan aspirasi Anda yang diperbarui oleh pihak desa setiap tahapnya.</p>
                        </div>
                    </div>
                </div>

                <!-- Login Form (Right Side) -->
                <div class="flex justify-center">
                    <div class="bg-[#F8F8F8] rounded-xl shadow-2xl w-full sm:w-3/4 md:w-full px-10 py-10 mx-10">
                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('images/png/logo.png') }}" alt="Karangwangi Sejahtera" class="w-auto h-20">
                        </div>
                        <form>
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" class="bg-[#D9D9D9] mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#D4A017] focus:border-[#D4A017]">
                            </div>
                            <div class="mb-6">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" id="password" name="password" placeholder="Masukkan Password" class="bg-[#D9D9D9] mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#D4A017] focus:border-[#D4A017]">
                            </div>
                            <div class="flex items-center mb-6">
                                <input type="checkbox" id="showPassword" class="mr-2">
                                <label for="showPassword" class="text-sm text-gray-700">Tampilkan Kata Sandi</label>
                            </div>
                            <button type="submit" class="w-full bg-[#D4A017] text-white py-2 px-6 rounded-lg">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-8">
                <a href="#" class="inline-block bg-[#D4A017] text-white py-3 px-6 rounded-lg font-bold">Ajukan Pendapat Sekarang!</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <x-footers.home />

</body>

<!-- Scripts -->
<script>
    var ctxPopulasi = document.getElementById('chartPopulasi').getContext('2d');
    var chartPopulasi = new Chart(ctxPopulasi, {
        type: 'bar',
        data: {
            labels: ['Balita', 'Anak-anak', 'Remaja', 'Dewasa', 'Lansia'],
            datasets: [{
                label: 'Jumlah Penduduk',
                data: [540, 560, 520, 542, 620],
                backgroundColor: '#CDAA65',
            }]
        },
        options: {
          maintainAspectRatio: false,  // Disable aspect ratio to control height and width independently
          aspectRatio: 1.5,  // Set aspect ratio (optional)
            scales: {
                x: { grid: { display: false } },
                y: { grid: { display: false }, ticks: { display: false } }
            },
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'top',
                    font: { family: 'Poppins', weight: 'bold', size: 14 },
                    color: 'black'
                },
                legend: {
                    display: false, // Hide the legend
                },
                title: {
                    display: false, // Hide the chart title
                },
            }
        },
        plugins: [ChartDataLabels]
    });

    var ctxGender = document.getElementById('chartGender').getContext('2d');
    var chartGender = new Chart(ctxGender, {
        type: 'doughnut',
        data: {
            labels: ['Pria', 'Perempuan'],
            datasets: [{
                label: 'Gender Distribution',
                data: [50, 50],
                backgroundColor: ['#CDAA65', '#3D6B47'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                  position: 'bottom',
                  labels: {
                    font: {
                      size: 16
                    },
                    boxWidth: 20, // Adjust the size of the box
                    usePointStyle: true, // This makes the markers circular
                    pointStyle: 'circle', // Set the point style to circle
                    padding: 40
                  }
                }
            }
        }
    });
</script>

<style>
    .carousel {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        overflow: hidden;
    }

    .carousel-images {
        display: flex;
        animation: slide 24s infinite;
    }

    .carousel-image {
        width: 100%;
        height: 1000px;
        object-fit: cover;
    }

    @keyframes slide {
        0% { transform: translateX(0); }
        25% { transform: translateX(-100%); }
        50% { transform: translateX(-200%); }
        75% { transform: translateX(-300%); }
        100% { transform: translateX(0); }
    }
</style>

</html>
