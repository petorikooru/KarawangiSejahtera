<!-- resources/views/components/cards/news-sub.blade.php -->
<div class="p-4 rounded-lg flex flex-row space-x-4">
    <img src="{{ $image }}" alt="News" class="max-w-[50%] rounded-lg">
    <div class="flex flex-col">
        <h4 class="text-md font-semibold text-[#8B4513] mt-2">{{ $title }}</h4>
        <p class="text-gray-700 text-sm">{{ $date }}</p>
    </div>
</div>
