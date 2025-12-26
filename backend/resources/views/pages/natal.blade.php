@extends('layouts.app')

@section('title', 'ASTROTUZ — Натальная карта')

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
        <x-card class="hero">
            <h1>Ваша Натальная Карта</h1>
            <p class="muted">Персональный расчёт по дате и месту рождения</p>

            <form class="form">
                <input placeholder="Имя" />
                <input placeholder="Дата рождения" />
                <input placeholder="Город рождения" />
                <button class="cta">Получить расчёт</button>
            </form>
        </x-card>

        <div class="services">
            <div class="card service">Натальная карта</div>
            <div class="card service">Совместимость</div>
            <div class="card service">Гороскоп</div>
            <div class="card service">Транзиты</div>
        </div>
    </section>

    {{-- RIGHT SIDEBAR --}}
    <aside class="sidebar desktop-only">
        <x-card class="glass-card">
            <h4 class="glass-title">Гороскоп для:</h4>
            <x-zodiac-grid :active-key="$activeKey ?? 'aries'" />
            <p class="muted" style="margin-top: 16px;">
                {{ $activeLabel ?? 'Овен' }} — {{ $activeDescription ?? 'Импульсивный лидер, который быстро загорается идеями и ведёт за собой.' }}
            </p>
        </x-card>
    </aside>
@endsection
