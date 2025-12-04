<!-- Footer Section -->
<footer class="bg-gradient-to-b from-[#FDFBF7] to-[#928F8B] py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Left: Website Description -->
            <div class="flex flex-col items-start">
                <div class="flex items-center space-x-4 mb-6">
                    <img src="{{ asset('images/png/logo.png') }}" alt="Karangwangi Sejahtera Logo" class="w-100 h-auto">
                </div>
                <p class="text-sm text-gray-700 mb-6 text-justify">
                    Website desa menginformasikan program dan layanan Pemerintah Desa Karangwangi kepada warga.
                    Memudahkan akses informasi lewat gawai. Warga dapat ikut berpartisipasi dan menyampaikan suara mereka untuk kemajuan desa.
                </p>
            </div>

            <!-- Center: Contact Info -->
            <div class="flex flex-col items-start">
                <h3 class="text-2xl font-semibold text-[#8B4513] mb-4">Kontak Desa</h3>

                <ul class="text-sm text-gray-700 space-y-2">
                    <li class="flex items-center space-x-2 flex-col text-justify w-full">
                        <span class="font-semibold text-lg w-full">Alamat:</span>
                        <span class="w-full">Desa Karangwangi RT 01 RW 01, Kecamatan Sukamaju, Kabupaten Cirebon</span>
                    </li>
                    <li class="flex items-center space-x-2 flex-col text-justify w-full">
                        <span class="font-semibold text-lg w-full">Telepon:</span>
                        <span class="w-full">+62 231 7700040</span>
                    </li>
                    <li class="flex items-center space-x-2 flex-col text-justify w-full">
                        <span class="font-semibold text-lg w-full">Email:</span>
                        <span class="w-full">karangwangi.desa@gmail.com</span>
                    </li>
                    <li class="flex items-center space-x-2 flex-col text-justify w-full">
                        <span class="font-semibold text-lg w-full">Jam Kerja:</span>
                        <span class="w-full">Senin sampai Jumat 08.00 sampai 16.00</span>
                    </li>
                </ul>

            </div>

            <!-- Right: Map Section -->
            <div class="flex flex-col items-start">
                <h3 class="text-2xl font-semibold text-[#8B4513] mb-4">Peta Desa</h3>
                <div class="w-full mb-4">
                    <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="flex space-x-4 justify-center items-center">
                    <a href="#" class="text-[#D4A017] hover:text-[#8B4513]">
                        <img src="{{ asset('images/png/icons/facebook.png') }}" alt="Facebook" class="w-12 h-auto">
                    </a>
                    <a href="#" class="text-[#D4A017] hover:text-[#8B4513]">
                        <img src="{{ asset('images/png/icons/twitter.png') }}" alt="Twitter" class="w-12 h-auto">
                    </a>
                    <a href="#" class="text-[#D4A017] hover:text-[#8B4513]">
                        <img src="{{ asset('images/png/icons/instagram.png') }}" alt="Instagram" class="w-12 h-auto">
                    </a>
                </div>
            </div>
        </div>

    </div>
</footer>
