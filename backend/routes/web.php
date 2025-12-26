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
