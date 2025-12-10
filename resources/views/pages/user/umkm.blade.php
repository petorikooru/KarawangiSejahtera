<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
    @if (!($hasUMKM ?? false))
        <!-- Empty State -->
        <div class="text-center py-16 px-6">
            <p class="text-gray-600 mb-8 text-lg">Belum ada profil yang dibuat.</p>
            <a href="#"
               class="inline-flex items-center px-8 py-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-300 font-medium shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Profil Sekarang
            </a>
        </div>
    @else
        <!-- Profile Exists -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 p-6 lg:p-10">
            <!-- Left: QR Code Section -->
            <div class="flex flex-col items-center justify-center space-y-6 order-2 lg:order-1">
                <!-- QR Code Container - Responsive size -->
                <div class="w-full max-w-sm aspect-square bg-gray-50 rounded-2xl border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden">
                    @if($umkm['qr_code'] ?? false)
                        <img src="{{ $umkm['qr_code'] }}" alt="QR Code UMKM" class="w-full h-full object-cover">
                    @else
                        <div class="text-center px-6">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-gray-500 text-sm">QR Code</p>
                        </div>
                    @endif
                </div>

                <div class="text-center space-y-4 w-full max-w-sm">
                    <p class="text-sm text-gray-600">Scan untuk akses cepat</p>
                    <a href="{{ $umkm['access_link'] ?? '#' }}"
                       class="block w-full bg-yellow-500 hover:bg-yellow-600 text-white py-3.5 rounded-lg font-medium transition-colors duration-200 shadow-sm">
                        Buka Link Akses
                    </a>
                </div>
            </div>

            <!-- Right: Information Section -->
            <div class="space-y-8 order-1 lg:order-2">
                <!-- Name + Logo -->
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 break-words">
                            {{ $umkm['name'] ?? 'Nama UMKM' }}
                        </h1>
                        @if(isset($umkm['app_link']) && $umkm['app_link'])
                            <a href="{{ $umkm['app_link'] }}"
                               class="mt-3 inline-block text-sm text-blue-600 hover:underline break-all">
                                {{ $umkm['app_link'] }}
                            </a>
                        @else
                            <p class="mt-3 text-sm text-gray-500">Link aplikasi belum ditambahkan</p>
                        @endif
                    </div>
                    @if(isset($umkm['logo']) && $umkm['logo'])
                        <img src="{{ $umkm['logo'] }}" alt="Logo {{ $umkm['name'] }}"
                             class="w-20 h-20 md:w-24 md:h-24 rounded-xl object-cover flex-shrink-0 shadow-md">
                    @endif
                </div>

                <!-- Phone & Address - Stacked on mobile, side-by-side on larger screens -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Telp Usaha</label>
                        <p class="text-gray-900 font-semibold">
                            {{ $umkm['phone'] ?? '—' }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Usaha</label>
                        <p class="text-gray-900 text-sm leading-relaxed">
                            {{ $umkm['address'] ?? '—' }}
                        </p>
                    </div>
                </div>

                <!-- Description -->
                <div class="pt-6 border-t border-gray-200">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Deskripsi Usaha</label>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $umkm['description'] ?? 'Deskripsi profil belum diisi.' }}
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                    <button type="button"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3.5 rounded-lg font-medium transition-colors duration-200 shadow-md">
                        Edit Profil Anda
                    </button>
                    <button type="button"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 py-3.5 rounded-lg font-medium transition-colors duration-200">
                        Lihat Template UMKM
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>