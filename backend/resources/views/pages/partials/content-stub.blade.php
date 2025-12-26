<x-card class="hero">
    <h1>{{ $stubTitle }}</h1>
    <p class="muted">{{ $stubSubtitle }}</p>
</x-card>

<x-card class="zodiac-description">
    <h2>Раздел в разработке</h2>
    <p class="muted">Мы уже собираем материалы и данные, чтобы наполнить этот раздел.</p>
</x-card>

<div class="services">
    @foreach ($stubLines as $line)
        <div class="card service">{{ $line }}</div>
    @endforeach
</div>
