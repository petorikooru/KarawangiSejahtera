<!-- Alpine CDN (in your layout head) -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Global store (after Alpine) -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('newsModal', {
            article: null,
            open(data) {
                this.article = data;
                document.body.classList.add('overflow-hidden');
            },
            close() {
                this.article = null;
                document.body.classList.remove('overflow-hidden');
            }
        });
    });
</script>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">

    @foreach ($paginatedBerita as $article)
        <?php
            // Convert anything (Eloquent or stdClass) into a clean plain array
            $item = $article instanceof \Illuminate\Database\Eloquent\Model
                ? $article->only(['id','judul','kategori','sumber','deskripsi','thumbnail','tanggal'])
                : (array) $article;

            // Ensure tanggal is a string (Carbon → ISO string, DateTime → string)
            if ($item['tanggal'] instanceof \DateTime || $item['tanggal'] instanceof \Carbon\Carbon) {
                $item['tanggal'] = $item['tanggal']->format('Y-m-d H:i:s');
            } elseif (is_object($item['tanggal'])) {
                $item['tanggal'] = (string) $item['tanggal'];
            }
        ?>

        <article 
            class="group relative overflow-hidden rounded-2xl shadow-xl h-64 sm:h-72 md:h-80 transition-all duration-300 hover:shadow-2xl cursor-pointer"
            @click="$store.newsModal.open({!! json_encode($item) !!})"
        >
            <a href="javascript:void(0)" class="block w-full h-full">
                <img 
                    src="{{ $article->thumbnail ?? $article->thumbnail ?? asset('images/png/sample/home5.png') }}" 
                    alt="{{ $article->judul }}"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                    loading="lazy"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                    <div class="flex justify-between items-start mb-2 gap-3">
                        <span class="text-xs font-bold px-2 py-1 rounded bg-yellow-500">
                            {{ $article->kategori ?? 'Berita' }}
                        </span>
                        <span class="text-xs bg-gray-800/80 px-2 py-1 rounded-full">
                            {{ $article->tanggal instanceof \DateTime ? $article->tanggal->format('d M Y') : $article->tanggal }}
                        </span>
                    </div>

                    <h3 class="text-lg font-semibold line-clamp-2">{{ $article->judul }}</h3>
                    <div class="text-xs opacity-50 font-medium">
                        Sumber: {{ $article->sumber ?? 'Desa Karangwangi' }}
                    </div>
                    <p class="text-xs opacity-90 line-clamp-3">{{ $article->deskripsi }}</p>
                </div>
            </a>
        </article>
    @endforeach
</div>

{{-- 4. THE MODAL (always present in DOM, shown/hidden with x-show) --}}
<div 
    x-data
    x-show="$store.newsModal.article"
    x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 px-4 overflow-y-auto"
    @keydown.escape.window="$store.newsModal.close()"
    @click="$store.newsModal.close()"
>
    <div 
        class="relative w-full max-w-4xl bg-white rounded-2xl shadow-2xl max-h-[95vh] overflow-y-auto"
        @click.stop
    >
        <!-- Close X -->
        <button @click="$store.newsModal.close()" 
                class="absolute top-4 right-4 z-10 w-10 h-10 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Back button -->
        <button @click="$store.newsModal.close()" 
                class="absolute top-4 left-4 z-10 flex items-center gap-2 bg-white/90 hover:bg-white px-4 py-2 rounded-full shadow-lg text-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali
        </button>

        <!-- Thumbnail -->
        <template x-if="$store.newsModal.article">
            <div class="w-full h-64 sm:h-96">
                <img :src="$store.newsModal.article.thumbnail || '{{ asset('images/png/sample/home5.png') }}'"
                     :alt="$store.newsModal.article.judul"
                     class="w-full h-full object-cover">
            </div>
        </template>

        <!-- Content -->
        <div class="p-6 sm:p-10">
            <div class="flex flex-wrap gap-4 mb-6 text-sm">
                <span class="px-3 py-1 bg-yellow-500 text-white font-bold rounded" x-text="$store.newsModal.article.kategori"></span>
                <span class="text-gray-600" x-text="new Date($store.newsModal.article.tanggal).toLocaleDateString('id-ID', {day:'2-digit', month:'short', year:'numeric'})"></span>
                <span class="text-gray-500">Sumber: <span x-text="$store.newsModal.article.sumber || 'Desa Karangwangi'"></span></span>
            </div>

            <h1 class="text-3xl sm:text-4xl font-bold mb-8" x-text="$store.newsModal.article.judul"></h1>

            <div class="prose prose-lg max-w-none text-gray-700"
                 x-html="$store.newsModal.article.deskripsi?.replace(/\n/g, '<br>') || ''">
            </div>
        </div>
    </div>
</div>

{{-- Pagination --}}
<div class="my-8 text-center">
    {{ $paginatedBerita->links() }}
</div>