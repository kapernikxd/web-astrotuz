<?php

namespace Database\Seeders;

use App\Models\LeftSidebarCard;
use Illuminate\Database\Seeder;

class LeftSidebarCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Натальная карта',
                'description' => 'Персональный разбор по дате рождения.',
                'cta_label' => 'Открыть раздел',
                'url' => '/natal-card',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Совместимость',
                'description' => 'Проверьте энергию пары по дате рождения.',
                'cta_label' => 'Посмотреть',
                'url' => '/compatibility',
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($items as $item) {
            LeftSidebarCard::updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
