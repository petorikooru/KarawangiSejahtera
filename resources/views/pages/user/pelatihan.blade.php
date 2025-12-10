<div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-8xl mx-auto">
    @foreach ($paginatedPelatihan as $event)
        <article class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 group transition-all duration-300 hover:shadow-xl">
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
                <h3 class="text-lg font-semibold text-gray-900 leading-tight line-clamp-2">{{ $event->title ?? 'Judul Pelatihan' }}</h3>
                
                <div class="flex items-center space-x-2 text-sm text-gray-600">
                    <x-bi-clock-fill />
                    <span>{{ $event->time ?? '18:30-20:30' }}</span>
                </div>
                
                <div class="flex items-center space-x-2 text-sm text-gray-600">
                    <x-bi-calendar-fill />
                    <span class="font-medium block">{{ $event->date->format('d M Y') ?? '28 Juni 2025' }}</span>
                </div>

                {{-- Date and location, formatted for quick scanning --}}
                <div class="text-sm text-gray-600 space-y-1">
                    <span class="inline-flex items-center gap-1 text-gray-500">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $event->location ?? 'Online' }}
                    </span>
                </div>
                
                {{-- Description, clamped to prevent overflow --}}
                <p class="text-sm text-gray-700 leading-relaxed line-clamp-3">
                    {{ $event->description ?? 'Deskripsi pelatihan singkat untuk mendukung pertumbuhan UMKM.' }}
                </p>
                
                {{-- Register button, full-width for emphasis --}}
                <a href="{{ $event->link ?? '#' }}" 
                   class="inline-block bg-yellow-500 text-white px-6 py-2 rounded-md hover:bg-yellow-600 transition-colors duration-200 text-sm font-medium w-full text-center">
                    Daftar
                </a>
            </div>
        </article>
    @endforeach
</div>

<!-- Pagination Links -->
<div class="my-6 text-center">
    {{ $paginatedPelatihan->links() }}
</div>