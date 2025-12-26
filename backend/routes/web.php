<?php

use Illuminate\Support\Facades\Route;

function stubPage(array $data)
{
    $zodiac = config('zodiac');
    $active = $zodiac['oven'];

    $snippets = [
        'Скоро здесь появится интерактивная витрина с рекомендациями.',
        'Мы готовим подборки, основанные на ваших данных и предпочтениях.',
        'Тестируем визуальные блоки и собираем контент.',
        'Эта секция будет обновляться автоматически по сезону.',
        'В ближайшее время добавим персональные настройки.',
        'Раздел в разработке, но уже скоро станет доступен.',
    ];

    $content = collect($snippets)->shuffle()->take(3)->values();

    return view('pages.natal', [
        'pageTitle' => 'ASTROTUZ — ' . $data['title'],
        'contentView' => 'pages.partials.content-stub',
        'stubTitle' => $data['title'],
        'stubSubtitle' => $data['subtitle'],
        'stubLines' => $content,
        'activeKey' => $active['key'],
        'activeLabel' => $active['label'],
        'activeDescription' => $active['description'],
    ]);
}

Route::get('/', function () {
    $zodiac = config('zodiac');
    $active = $zodiac['oven'];

    return view('pages.natal', [
        'activeKey' => $active['key'],
        'activeLabel' => $active['label'],
        'activeDescription' => $active['description'],
    ]);
})->name('natal');

Route::get('/fixed-stars', function () {
    return stubPage([
        'title' => 'Неподвижные звезды',
        'subtitle' => 'Собираем карту созвездий и их влияния.',
    ]);
})->name('fixed-stars');

Route::get('/horoscopes-online', function () {
    return stubPage([
        'title' => 'Гороскопы онлайн',
        'subtitle' => 'Готовим ежедневные и недельные прогнозы.',
    ]);
})->name('horoscopes-online');

Route::get('/eastern-astrology', function () {
    return stubPage([
        'title' => 'Восточная Астрология',
        'subtitle' => 'Собираем систему стихий и годов рождения.',
    ]);
})->name('eastern-astrology');

Route::get('/western-astrology', function () {
    return stubPage([
        'title' => 'Западная Астрология',
        'subtitle' => 'Подготавливаем классические техники анализа.',
    ]);
})->name('western-astrology');

Route::get('/lunar-astrology', function () {
    return stubPage([
        'title' => 'Лунная Астрология',
        'subtitle' => 'Строим лунные календари и рекомендации.',
    ]);
})->name('lunar-astrology');

Route::get('/talismans-biorhythms', function () {
    return stubPage([
        'title' => 'Талисманы и биоритмы',
        'subtitle' => 'Подбираем амулеты и персональные циклы.',
    ]);
})->name('talismans-biorhythms');

Route::get('/horoscope', function () {
    return stubPage([
        'title' => 'Гороскоп',
        'subtitle' => 'Скоро здесь появится полноценный прогноз.',
    ]);
})->name('horoscope');

Route::get('/lunar', function () {
    return stubPage([
        'title' => 'Лунные',
        'subtitle' => 'Готовим лунные календари и ритмы.',
    ]);
})->name('lunar');

Route::get('/feng-shui', function () {
    return stubPage([
        'title' => 'Фен Шуй',
        'subtitle' => 'Настраиваем энергии пространства.',
    ]);
})->name('feng-shui');

Route::get('/test-my', function () {
    return stubPage([
        'title' => 'Тест-My?',
        'subtitle' => 'Собираем тесты и интерактивы.',
    ]);
})->name('test-my');

Route::get('/talismans', function () {
    return stubPage([
        'title' => 'Талисманы',
        'subtitle' => 'Подбираем символы и амулеты.',
    ]);
})->name('talismans');

Route::get('/compatibility', function () {
    return stubPage([
        'title' => 'Совместимость',
        'subtitle' => 'Сводим пары и сравниваем энергии.',
    ]);
})->name('compatibility');

Route::get('/zodiac-compatibility', function () {
    return stubPage([
        'title' => 'Совместимость знаков зодиака',
        'subtitle' => 'Готовим детальные разборы пар.',
    ]);
})->name('zodiac-compatibility');

Route::get('/synastry', function () {
    return stubPage([
        'title' => 'Синастрия',
        'subtitle' => 'Добавляем аналитику карт отношений.',
    ]);
})->name('synastry');

Route::get('/solar', function () {
    return stubPage([
        'title' => 'Соляр',
        'subtitle' => 'Формируем годовые прогнозы по дате рождения.',
    ]);
})->name('solar');

Route::get('/source', function () {
    return stubPage([
        'title' => 'Источник',
        'subtitle' => 'Собираем проверенные материалы и справку.',
    ]);
})->name('source');

Route::get('{sign}/harakteristika', function (string $sign) {
    $zodiac = config('zodiac');

    if (!array_key_exists($sign, $zodiac)) {
        abort(404);
    }

    $active = $zodiac[$sign];

    return view('pages.natal', [
        'activeKey' => $active['key'],
        'activeLabel' => $active['label'],
        'activeDescription' => $active['description'],
    ]);
})->name('zodiac.show');

Route::get('/stub/{slug}', function (string $slug) {
    $stubs = [
        'horoscope' => [
            'title' => 'Гороскоп',
            'subtitle' => 'Скоро здесь появится полноценный прогноз.',
        ],
        'lunar' => [
            'title' => 'Лунные',
            'subtitle' => 'Готовим лунные календари и ритмы.',
        ],
        'feng-shui' => [
            'title' => 'Фен-Шуй',
            'subtitle' => 'Настраиваем энергии пространства.',
        ],
        'test-my' => [
            'title' => 'Тест-My?',
            'subtitle' => 'Собираем тесты и интерактивы.',
        ],
        'talismans' => [
            'title' => 'Талисманы',
            'subtitle' => 'Подбираем символы и амулеты.',
        ],
        'compatibility' => [
            'title' => 'Совместимость',
            'subtitle' => 'Сводим пары и сравниваем энергии.',
        ],
    ];

    if (!array_key_exists($slug, $stubs)) {
        abort(404);
    }

    $snippets = [
        'Скоро здесь появится интерактивная витрина с рекомендациями.',
        'Мы готовим подборки, основанные на ваших данных и предпочтениях.',
        'Тестируем визуальные блоки и собираем контент.',
        'Эта секция будет обновляться автоматически по сезону.',
        'В ближайшее время добавим персональные настройки.',
        'Раздел в разработке, но уже скоро станет доступен.',
    ];

    $content = collect($snippets)->shuffle()->take(3)->values();

    return view('pages.stub', [
        'title' => $stubs[$slug]['title'],
        'subtitle' => $stubs[$slug]['subtitle'],
        'content' => $content,
    ]);
})->name('stub');
