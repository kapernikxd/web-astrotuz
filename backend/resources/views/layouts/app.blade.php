<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'ASTROTUZ')</title>

    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
</head>
<body>

    @include('partials.topbar')
    @include('partials.mobile-menu')

    <main class="container layout">
        @yield('content')
    </main>

    <script src="{{ asset('js/header-menu.js') }}"></script>
</body>
</html>
