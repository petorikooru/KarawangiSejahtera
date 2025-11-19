<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ url('/images/svg/logo.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')
</head>

<body class="flex flex-col min-h-screen">
    <header>
        @include('components.headerbars.home')
    </header>

    <main class="flex-1">
        @yield('contents')
    </main>

    {{-- <footer>
        @include('components.footers.home')
    </footer> --}}
</body>

</html>
