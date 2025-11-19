<button type="{{ $type ?? 'button' }}" class="py-2.5 px-3 rounded-md transition-colors duration-300 {{ $class ?? '' }}">
    {{ $slot }}
</button>
