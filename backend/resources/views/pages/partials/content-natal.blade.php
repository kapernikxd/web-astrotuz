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

<x-card class="zodiac-description">
    <h2>Краткое описание знака</h2>
    <p class="muted">
        {{ $activeLabel ?? 'Овен' }} — {{ $activeDescription ?? 'Импульсивный лидер, который быстро загорается идеями и ведёт за собой.' }}
    </p>
</x-card>

<div class="services">
    <div class="card service">Натальная карта</div>
    <div class="card service">Совместимость</div>
    <div class="card service">Гороскоп</div>
    <div class="card service">Транзиты</div>
</div>
