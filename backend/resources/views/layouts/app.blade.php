<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'ASTROTUZ')</title>
    @php
        $metaDescription = trim($__env->yieldContent('meta_description'));
    @endphp
    @if($metaDescription !== '')
        <meta name="description" content="{{ $metaDescription }}" />
    @endif

    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/zodiac-builder.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>

    @include('partials.topbar')
    @include('partials.mobile-menu')

    <main class="container @yield('layout_class', 'layout')">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset('js/header-menu.js') }}"></script>
</body>
</html>
