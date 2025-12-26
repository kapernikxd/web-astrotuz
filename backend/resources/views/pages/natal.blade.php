@extends('layouts.app')

@section('title', $pageTitle ?? 'ASTROTUZ — Натальная карта')

@section('content')
    {{-- LEFT SIDEBAR --}}
    <aside class="sidebar desktop-only">
        @include('pages.partials.left-sidebar-links')
    </aside>

    {{-- CONTENT --}}
    <section class="content">
        @include($contentView ?? 'pages.partials.content-natal')
    </section>

    {{-- RIGHT SIDEBAR --}}
    <aside class="sidebar desktop-only">
        <x-card class="glass-card">
            <h4 class="glass-title">Гороскоп для:</h4>
            <x-zodiac-grid :active-key="$activeKey ?? 'aries'" />
        </x-card>
    </aside>
@endsection
