<a href="{{ $link }}">

<div class="p-4 rounded-lg flex flex-col lg:flex-row space-x-4">
    <!-- Image Section: Full width on small screens, 50% width on larger screens -->
    <img src="{{ $image }}" alt="News" class="w-full lg:w-1/2 rounded-lg mb-4 lg:mb-0">

    <!-- Text Section: Adjust layout and spacing -->
    <div class="flex flex-col lg:w-1/2">
        <h4 class="text-md font-semibold text-[#8B4513] mt-2">{{ $title }}</h4>
        <p class="text-gray-700 text-sm">{{ $date }}</p>
    </div>
</div>

</a>
