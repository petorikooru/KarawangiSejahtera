<script src="//unpkg.com/alpinejs" defer></script>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-8xl mx-auto">
    @foreach ($paginatedPelatihan as $event)
        <article 
            class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 group transition-all duration-300 hover:shadow-xl"
            x-data="{ registered: {{ Auth::check() && Auth::user()->pelatihan()->where('pelatihan_id', $event->id)->exists() ? 'true' : 'false' }}, 
                      showModal: false, 
                      currentEventId: {{ $event->id }} }">

            <div class="relative h-48 overflow-hidden">
                <img
                    src="{{ $event->thumbnail ?? asset('images/events/default.jpg') }}"
                    alt="{{ $event->title ?? 'Pelatihan Event' }}"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                    loading="lazy"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/10 via-transparent to-transparent"></div>
            </div>

            <div class="p-6 space-y-4">
                <h3 class="text-lg font-semibold text-gray-900 leading-tight line-clamp-2">
                    {{ $event->title ?? 'Judul Pelatihan' }}
                </h3>

                <div class="flex items-center space-x-2 text-sm text-gray-600">
                    <x-bi-clock-fill />
                    <span>{{ $event->time ?? '18:30-20:30' }}</span>
                </div>

                <div class="flex items-center space-x-2 text-sm text-gray-600">
                    <x-bi-calendar-fill />
                    <span class="font-medium">{{ $event->date->format('d M Y') ?? '28 Juni 2025' }}</span>
                </div>

                <div class="text-sm text-gray-600">
                    <span class="inline-flex items-center gap-1 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $event->location ?? 'Online' }}
                    </span>
                </div>

                <p class="text-sm text-gray-700 leading-relaxed line-clamp-3">
                    {{ $event->description ?? 'Deskripsi pelatihan singkat untuk mendukung pertumbuhan UMKM.' }}
                </p>

                <!-- Register Button with Confirmation Modal Trigger -->
                <template x-if="!registered">
                    <button
                        @click="showModal = true"
                        class="w-full bg-yellow-500 text-white px-6 py-3 rounded-md hover:bg-yellow-600 transition-colors duration-200 text-sm font-medium">
                        Daftar
                    </button>
                </template>

                <template x-if="registered">
                    <button
                        disabled
                        class="w-full bg-gray-300 text-gray-600 px-6 py-3 rounded-md cursor-not-allowed text-sm font-medium flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Terdaftar
                    </button>
                </template>
            </div>

            <!-- Confirmation Modal (only one per card) -->
            <div 
                x-show="showModal"
                x-transition
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-sm"
                @click.self="showModal = false"
                @keydown.escape.window="showModal = false">

                <div class="bg-white rounded-lg shadow-2xl max-w-sm w-full mx-4 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">
                        Konfirmasi Pendaftaran
                    </h3>
                    <p class="text-gray-700 mb-6">
                        Apakah Anda yakin ingin mendaftar pelatihan <strong>“{{ $event->title }}”</strong>?
                    </p>

                    <div class="flex gap-3 justify-end">
                        <button
                            @click="showModal = false"
                            class="px-5 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 transition">
                            Batal
                        </button>

                        <form action="{{ route('pelatihan.register', $event->id) }}" method="POST" class="inline">
                            @csrf
                            <input type="hidden" name="redirect_to" value="{{ url()->full() }}">

                            <button
                                type="submit"
                                @click="registered = true; showModal = false"
                                class="px-6 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition font-medium">
                                Ya, Daftar Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
</div>

<!-- Pagination -->
<div class="my-8 text-center">
    {{ $paginatedPelatihan->links() }}
</div>