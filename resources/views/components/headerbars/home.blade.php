<header id="header" class="fixed top-0 left-0 w-full flex justify-between items-center text-[#000000] font-semibold px-6 lg:px-10 2xl:px-30 py-4 z-50 transition-all duration-300 ease-in-out ">
    <!-- Left (Logo) -->
    <div class="shrink-0">
        <a href="/">
            <img src="{{ url('/images/png/logo.png') }}" alt="Logo website" class="w-32 sm:w-40 md:w-48 transition-all duration-300 ease-in-out">
        </a>
    </div>

    <!-- Center (Navigation) -->
    <nav class="hidden lg:flex space-x-12 justify-center flex-grow text-center">
        <a href="/tentang-kami" class="hover:text-[#CDAA65] transition-colors">Tentang Kami</a>
        <a href="/berita-terkini" class="hover:text-[#CDAA65] transition-colors">Berita Terkini</a>
        <a href="/informasi-kegiatan-desa" class="hover:text-[#CDAA65] transition-colors">Informasi Kegiatan Desa</a>
        <a href="/desa-bersuara" class="hover:text-[#CDAA65] transition-colors">Desa Bersuara</a>
    </nav>

    <!-- Right (Buttons) -->
    <div class="hidden lg:flex space-x-4">
        <a href="/daftar2">
            <x-buttons.small class="bg-[#5A5246] text-[#FFFFFF] hover:bg-gradient-to-b hover:from-[#CDAA65] hover:to-[#675533]">
                Daftar
            </x-buttons.small>
        </a>
        <a href="/login">
            <x-buttons.small class="bg-[#262424] text-[#FFFFFF] hover:bg-gradient-to-b hover:from-[#CDAA65] hover:to-[#675533]">
                Masuk
            </x-buttons.small>
        </a>
    </div>

    <!-- Mobile Hamburger Menu (for smaller screens) -->
    <div class="lg:hidden flex items-center">
        <button id="hamburger" class="text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Navigation Menu (hidden by default) -->
    <div id="mobileMenu" class="lg:hidden hidden absolute top-16 left-0 w-full bg-[#F7F5F1] shadow-md z-40 p-4 space-y-4 transition-all duration-300 ease-in-out lg:mt-5 md:mt-5 sm:mt-0">
        <a href="/tentang-kami" class="block text-lg hover:text-[#CDAA65] transition-colors">Tentang Kami</a>
        <a href="/berita-terkini" class="block text-lg hover:text-[#CDAA65] transition-colors">Berita Terkini</a>
        <a href="/informasi-kegiatan-desa" class="block text-lg hover:text-[#CDAA65] transition-colors">Informasi Kegiatan Desa</a>
        <a href="/desa-bersuara" class="block text-lg hover:text-[#CDAA65] transition-colors">Desa Bersuara</a>
        <div class="space-x-4 mt-4">
            <a href="/signup" class="inline-block text-white bg-[#5A5246] py-2 px-4 rounded hover:bg-gradient-to-b hover:from-[#CDAA65] hover:to-[#675533]">Daftar</a>
            <a href="/login" class="inline-block text-white bg-[#262424] py-2 px-4 rounded hover:bg-gradient-to-b hover:from-[#CDAA65] hover:to-[#675533]">Masuk</a>
        </div>
    </div>
</header>

<script>
    // Toggle mobile menu visibility
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    window.addEventListener('scroll', function () {
        const header = document.getElementById('header');
        if (window.scrollY > 50) { // Adjust 50 to your preferred scroll threshold
            header.classList.add('bg-[#FDFBF7]');
            header.classList.add('shadow-lg');
        } else {
            header.classList.remove('bg-[#FDFBF7]');
            header.classList.remove('shadow-lg');
        }
    });
</script>
