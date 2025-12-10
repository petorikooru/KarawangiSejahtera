<article class="group relative overflow-hidden rounded-2xl shadow-xl h-64 sm:h-72 md:h-80 transition-all duration-300 hover:shadow-2xl cursor-pointer">
    <a href="{{ $link }}" class="block w-full h-full">

        <img 
            src="{{ $thumbnail }}" 
            alt="{{ $title }}" 
            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
            loading="lazy"
        >

        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

        <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 text-white">

            <div class="flex flex-wrap justify-between items-start mb-2 gap-2">
                <span class="text-xs font-bold px-2 py-1 rounded bg-yellow-500 text-white whitespace-nowrap">
                    {{ $category }}
                </span>
                <span class="text-xs bg-gray-800/80 px-2 py-1 rounded-full whitespace-nowrap">
                    {{ $date }}
                </span>
            </div>

            <div class="space-y-1">
                <h3 class="text-base sm:text-lg font-semibold line-clamp-2 leading-tight">{{ $title }}</h3>
                <div class="text-xs opacity-80 font-medium">Sumber: {{ $source }}</div>
                <p class="text-xs sm:text-sm line-clamp-3 leading-relaxed opacity-90">{{ $description }}</p>
            </div>
        </div>
    </a>
</article>