<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ url('/images/svg/logo.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')
</head>

<body>
    <div class="bg-[#E4DFD7]">
        <header>
            @include('components.headerbars.home')
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            @include('components.footers.home')
        </footer>
    </div>
</body>

</html>
