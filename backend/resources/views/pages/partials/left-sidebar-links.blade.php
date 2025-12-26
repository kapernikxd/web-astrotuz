@php
    $sidebarLinks = [
        [
            'title' => 'Натальная карта',
            'subtitle' => 'Персональный разбор по дате рождения.',
            'url' => route('natal'),
        ],
        [
            'title' => 'Неподвижные звезды',
            'subtitle' => 'Созвездия и их сакральные влияния.',
            'url' => route('fixed-stars'),
        ],
        [
            'title' => 'Гороскопы онлайн',
            'subtitle' => 'Актуальные прогнозы на каждый день.',
            'url' => route('horoscopes-online'),
        ],
        [
            'title' => 'Восточная Астрология',
            'subtitle' => 'Циклы года и энергия стихий.',
            'url' => route('eastern-astrology'),
        ],
        [
            'title' => 'Западная Астрология',
            'subtitle' => 'Классические школы и подходы.',
            'url' => route('western-astrology'),
        ],
        [
            'title' => 'Лунная Астрология',
            'subtitle' => 'Фазы Луны и ритмы месяца.',
            'url' => route('lunar-astrology'),
        ],
        [
            'title' => 'Талисманы и биоритмы',
            'subtitle' => 'Персональные амулеты и циклы.',
            'url' => route('talismans-biorhythms'),
        ],
        [
            'title' => 'Фен Шуй',
            'subtitle' => 'Гармония дома и пространства.',
            'url' => route('feng-shui'),
        ],
        [
            'title' => 'Совместимость знаков зодиака',
            'subtitle' => 'Пары, аспекты, химия характеров.',
            'url' => route('zodiac-compatibility'),
        ],
        [
            'title' => 'Синастрия',
            'subtitle' => 'Карты отношений и судьбоносных встреч.',
            'url' => route('synastry'),
        ],
        [
            'title' => 'Соляр',
            'subtitle' => 'Годовой прогноз в момент рождения.',
            'url' => route('solar'),
        ],
        [
            'title' => 'Источник',
            'subtitle' => 'Собираем базу знаний и материалы.',
            'url' => route('source'),
        ],
    ];
@endphp

<nav class="sidebar-links">
    @foreach ($sidebarLinks as $link)
        <a class="card sidebar-card" href="{{ $link['url'] }}">
            <span class="sidebar-card__title">{{ $link['title'] }}</span>
            <span class="sidebar-card__desc">{{ $link['subtitle'] }}</span>
            <span class="sidebar-card__cta">Открыть раздел</span>
        </a>
    @endforeach
</nav>
