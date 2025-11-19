<header class=" absolute top-0 w-full flex justify-between items-center text-[#000000] bg-transparent font-semibold px-6 lg:px-10 2xl:px-30 py-15 ">
    <!-- Kiri -->
    <div class="shrink-0">
        <a href="/">
            <img src="{{ url('/images/png/logo.png') }}" alt="Logo website" class="w-40">
        </a>
    </div>

    <!-- Tengah -->
    <nav class="flex space-x-12">
        <a href="/tentang-kami">Tentang Kami</a>
        <a href="/berita-terkini">Berita Terkini</a>
        <a href="/informasi-kegiatan-desa">Informasi Kegiatan Desa</a>
        <a href="/desa-bersuara">Desa Bersuara</a>
    </nav>

    <!-- Kanan -->
    <div class="flex space-x-4">
        <a href="/signup"> <x-buttons.small class="bg-[#5A5246] text-[#FFFFFF] hover:bg-gradient-to-b hover:from-[#CDAA65] hover:to-[#675533]">
            Daftar
        </x-buttons.small> </a>
        <a href="/login"> <x-buttons.small class="bg-[#262424] text-[#FFFFFF] hover:bg-gradient-to-b hover:from-[#CDAA65] hover:to-[#675533]">
            Masuk
        </x-buttons.small> </a>
    </div>
</header>
