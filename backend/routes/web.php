<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $zodiac = config('zodiac');
    $active = $zodiac['oven'];

    return view('pages.natal', [
        'activeKey' => $active['key'],
        'activeLabel' => $active['label'],
        'activeDescription' => $active['description'],
    ]);
})->name('natal');

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
