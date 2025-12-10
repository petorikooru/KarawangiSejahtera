<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">

    <!-- TODO: Make it components -->
    <!-- @foreach ($paginatedBerita as $article)
        <x-cards.news-user
            thumbnail   = "{{ $article->thumbnail }}"
            title       = "{{ $article->judul }}"
            category    = "{{ $article->kategori }}"
            date        = "{{ $article->tanggal->format('d M Y') }}"
            source      = "{{ $article->sumber }}"
            description = "{{ $article->deskripsi }}"
            link        = "#"
        />
    @endforeach -->

    @foreach ($paginatedBerita as $article)
        <article class="group relative overflow-hidden rounded-2xl shadow-xl h-64 sm:h-72 md:h-80 transition-all duration-300 hover:shadow-2xl cursor-pointer">
            <a href="#" class="block w-full h-full">
                <img 
                    src="{{ $article->thumbnail ?? asset('images/png/sample/home5.png') }}" 
                    alt="{{ $article->judul ?? 'Artikel Berita' }}" 
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                    loading="lazy"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 text-white">
                    <div class="flex flex-wrap justify-between items-start mb-2 gap-2">
                        <span class="text-xs font-bold px-2 py-1 rounded bg-yellow-500 text-white whitespace-nowrap">
                            {{ $article->kategori ?? 'Berita' }}
                        </span>
                        <span class="text-xs bg-gray-800/80 px-2 py-1 rounded-full whitespace-nowrap">
                            {{ $article->tanggal->format('d M Y') }}
                        </span>
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-base sm:text-lg font-semibold line-clamp-2 leading-tight">{{ $article->judul }}</h3>
                        <div class="text-xs opacity-80 font-medium">Sumber: {{ $article->sumber ?? 'Desa Karangwangi' }}</div>
                        <p class="text-xs sm:text-sm line-clamp-3 leading-relaxed opacity-90">{{ $article->deskripsi }}</p>
                    </div>
                </div>
            </a>
        </article>
    @endforeach
</div>

<!-- Pagination Links -->
<div class="my-6 text-center">
    {{ $paginatedBerita->links() }}
</div>