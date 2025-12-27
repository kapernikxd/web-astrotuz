<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title' => 'Гороскоп', 'icon' => '＋', 'sort_order' => 10],
            ['title' => 'Лунные', 'icon' => '☾', 'sort_order' => 20],
            ['title' => 'Фен-Шуй', 'icon' => '✣', 'sort_order' => 30],
            ['title' => 'Тест-My?', 'icon' => '⌁', 'sort_order' => 40],
            ['title' => 'Талисманы', 'icon' => '✦', 'sort_order' => 50],
            ['title' => 'Совместимость', 'icon' => '⟲', 'sort_order' => 60],
        ];

        foreach ($items as $item) {
            MenuItem::updateOrCreate(
                ['title' => $item['title']],
                [
                    'icon' => $item['icon'],
                    'sort_order' => $item['sort_order'],
                    'is_active' => true,
                ]
            );
        }
    }
}
