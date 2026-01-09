<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <x-go-back-button/>
        <h1 class="mt-4">
            @yield('title')
        </h1>
        {{-- <h3>
            @yield('category')
        </h3>
        <h5>
            Tecnologie usate: @yield('tech')
        </h5> --}}
        @yield('actions')
        @yield('content')
    </div>
</body>
</html>