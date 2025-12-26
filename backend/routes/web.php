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
        'title' => 'Фен-Шуй',
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
