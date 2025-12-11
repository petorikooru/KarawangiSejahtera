<!-- Alpine.js (include once in your layout) -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
    @if (!($hasUMKM ?? false))
        <!-- Empty State -->
        <div class="text-center py-16 px-6">
            <p class="text-gray-600 mb-8 text-lg">Belum ada profil yang dibuat.</p>
            <a href="{{ route('umkm.create') }}"
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
                            <a href="{{ $umkm['app_link'] }}" class="mt-3 inline-block text-sm text-blue-600 hover:underline break-all">
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

                <!-- Phone & Address -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Telp Usaha</label>
                        <p class="text-gray-900 font-semibold">{{ $umkm['phone'] ?? '—' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Usaha</label>
                        <p class="text-gray-900 text-sm leading-relaxed">{{ $umkm['address'] ?? '—' }}</p>
                    </div>
                </div>

                <!-- Description -->
                <div class="pt-6 border-t border-gray-200">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Deskripsi Usaha</label>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $umkm['description'] ?? 'Deskripsi profil belum diisi.' }}
                    </p>
                </div>

                <!-- Single Edit Button -->
                <div class="pt-6 border-t border-gray-200">
                    <button type="button" x-data @click="$dispatch('open-edit-drawer')"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3.5 rounded-lg font-medium transition-colors duration-200 shadow-md">
                        Edit Profil Anda
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Edit Drawer - Works with your current dummy setup -->
<div x-data="{ open: false }"
     @open-edit-drawer.window="open = true"
     x-show="open"
     x-transition
     class="fixed inset-0 z-50 overflow-hidden"
     style="display: none;">

    <div class="absolute inset-0 overflow-hidden">
        <!-- Overlay -->
        <div x-show="open" 
             x-transition.opacity 
             class="absolute inset-0 bg-black bg-opacity-50"
             @click="open = false"></div>

        <!-- Panel -->
        <div class="absolute inset-y-0 right-0 max-w-full flex">
            <div x-show="open"
                 x-transition:enter="transform transition ease-in-out duration-500"
                 x-transition:enter-start="translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transform transition ease-in-out duration-500"
                 x-transition:leave-end="translate-x-full"
                 class="w-screen max-w-2xl bg-white shadow-2xl flex flex-col h-full">

                <!-- Header -->
                <div class="px-6 py-5 bg-gradient-to-r from-blue-600 to-blue-700">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-white">Edit Profil UMKM</h2>
                        <button @click="open = false" class="text-white hover:text-gray-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Form Body -->
                <form action="#" method="POST" class="flex-1 overflow-y-auto px-6 py-8 space-y-8" 
                      @submit.prevent="
                          alert('Profil berhasil diperbarui! (Demo mode aktif)'); 
                          open = false;
                      ">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Nama Usaha -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Usaha</label>
                            <input type="text" name="name" 
                                   value="{{ $umkm['name'] ?? '' }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   required>
                        </div>

                        <!-- Logo Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Logo Usaha</label>
                            <input type="file" accept="image/*" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            @if(isset($umkm['logo']) && $umkm['logo'])
                                <img src="{{ $umkm['logo'] }}" class="mt-4 h-28 w-28 object-cover rounded-xl border shadow-sm">
                            @endif
                        </div>

                        <!-- QR Code Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">QR Code (opsional)</label>
                            <input type="file" accept="image/*" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>

                        <!-- Phone & Address -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                            <input type="text" name="phone" value="{{ $umkm['phone'] ?? '' }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Usaha</label>
                            <input type="text" name="address" value="{{ $umkm['address'] ?? '' }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Links -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Link Aplikasi (opsional)</label>
                            <input type="url" name="app_link" value="{{ $umkm['app_link'] ?? '' }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Access Link (otomatis)</label>
                            <input type="text" value="{{ $umkm['access_link'] ?? '' }}" readonly 
                                   class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg">
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Usaha</label>
                        <textarea name="description" rows="6" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 resize-none">{{ $umkm['description'] ?? '' }}</textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-4 pt-6 border-t border-gray-200">
                        <button type="button" @click="open = false"
                                class="px-8 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition">
                            Batal
                        </button>
                        <button type="submit"
                                class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium shadow-md transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>