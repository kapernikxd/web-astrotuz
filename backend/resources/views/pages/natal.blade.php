@extends('layouts.app')

@section('title', $pageTitle ?? 'ASTROTUZ — Натальная карта')

@section('content')
    {{-- LEFT SIDEBAR --}}
    <aside class="sidebar desktop-only">
        <x-card>
            <h4 class="gold">Астрологический дневник</h4>
            <p class="muted">14 лунный день</p>
        </x-card>

        <x-card>
            <h4 class="gold">Планеты сейчас</h4>
            <p class="violet">Меркурий ретрограден</p>
        </x-card>
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
