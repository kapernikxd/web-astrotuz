@extends('layouts.page-main')

@section('title', 'ASTROTUZ — Натальная карта')

@section('page_content')
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
@endsection
