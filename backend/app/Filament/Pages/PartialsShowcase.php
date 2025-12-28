<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class PartialsShowcase extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'UI блоки (Partials)';
    protected static ?string $navigationGroup = 'Content';
    protected static ?string $slug = 'partials-showcase';

    protected static string $view = 'filament.pages.partials-showcase';

    protected function getViewData(): array
    {
        $menuItems = $this->menuItems();

        return [
            'sections' => [
                [
                    'title' => 'Навигация',
                    'description' => 'Служебные блоки, которые отвечают за навигацию и быстрые действия пользователя.',
                    'blocks' => [
                        [
                            'label' => 'Topbar',
                            'path' => 'resources/views/partials/topbar.blade.php',
                            'summary' => 'Основная шапка сайта с логотипом, ссылками и действиями.',
                            'use_cases' => [
                                'Глобальная навигация по разделам сайта',
                                'Доступ к поиску и профилю пользователя',
                            ],
                            'partial' => 'partials.topbar',
                            'data' => ['menuItems' => $menuItems],
                            'mock' => [
                                'menuItems' => $menuItems,
                            ],
                        ],
                        [
                            'label' => 'Mobile menu',
                            'path' => 'resources/views/partials/mobile-menu.blade.php',
                            'summary' => 'Выезжающее мобильное меню для компактной навигации.',
                            'use_cases' => [
                                'Навигация на мобильных устройствах',
                                'Список быстрых ссылок и выход из аккаунта',
                            ],
                            'partial' => 'partials.mobile-menu',
                            'data' => ['menuItems' => $menuItems],
                            'mock' => [
                                'menuItems' => $menuItems,
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Zodiac Builder',
                    'description' => 'Блоки для страниц знаков зодиака: верхний экран, статья и подборка совместимости.',
                    'blocks' => [
                        [
                            'label' => 'Zodiac Hero',
                            'path' => 'resources/views/partials/zodiac/hero.blade.php',
                            'summary' => 'Главный экран для страницы знака с вводным текстом.',
                            'use_cases' => [
                                'Заголовок и краткое описание знака',
                                'Выделение ключевой темы страницы',
                            ],
                            'partial' => 'partials.zodiac.hero',
                            'data' => [
                                'block' => [
                                    'eyebrow' => 'Знак зодиака',
                                    'title' => 'Овен',
                                    'intro' => "Смелый и энергичный лидер, который любит действовать быстро.\nЛучше всего раскрывается в динамичных задачах.",
                                ],
                            ],
                            'mock' => [
                                'block' => [
                                    'eyebrow' => 'Знак зодиака',
                                    'title' => 'Овен',
                                    'intro' => 'Смелый и энергичный лидер, который любит действовать быстро.',
                                ],
                            ],
                        ],
                        [
                            'label' => 'Zodiac Article',
                            'path' => 'resources/views/partials/zodiac/article.blade.php',
                            'summary' => 'Контентный блок для более подробной статьи.',
                            'use_cases' => [
                                'Расширенное описание характера',
                                'Список сильных и слабых сторон',
                            ],
                            'partial' => 'partials.zodiac.article',
                            'data' => [
                                'block' => [
                                    'heading' => 'Характер и сильные стороны',
                                    'body' => '<p>Овны быстро принимают решения и готовы брать ответственность.</p><ul><li>Инициативность</li><li>Прямота</li><li>Сильная мотивация</li></ul>',
                                ],
                            ],
                            'mock' => [
                                'block' => [
                                    'heading' => 'Характер и сильные стороны',
                                    'body' => 'HTML с абзацами, списками и акцентами.',
                                ],
                            ],
                        ],
                        [
                            'label' => 'Zodiac Compatibility',
                            'path' => 'resources/views/partials/zodiac/compatibility.blade.php',
                            'summary' => 'Горизонтальная лента карточек совместимости.',
                            'use_cases' => [
                                'Переходы на другие страницы знаков',
                                'Выделение лучших пар для отношений',
                            ],
                            'partial' => 'partials.zodiac.compatibility',
                            'data' => [
                                'block' => [
                                    'compatibility_title' => 'Совместимость с другими знаками',
                                    'description' => "Подборка лучших сочетаний для отношений и дружбы.",
                                    'items' => [
                                        [
                                            'label' => 'Лев',
                                            'meta' => '90% совпадений',
                                            'cta' => 'Посмотреть пару',
                                            'url' => '/zodiac/leo',
                                        ],
                                        [
                                            'label' => 'Стрелец',
                                            'meta' => '85% совпадений',
                                            'cta' => 'Открыть совместимость',
                                            'url' => '/zodiac/sagittarius',
                                        ],
                                        [
                                            'label' => 'Близнецы',
                                            'meta' => '78% совпадений',
                                            'cta' => 'Читать статью',
                                            'url' => '/zodiac/gemini',
                                        ],
                                    ],
                                ],
                            ],
                            'mock' => [
                                'block' => [
                                    'compatibility_title' => 'Совместимость с другими знаками',
                                    'description' => 'Подборка лучших сочетаний для отношений и дружбы.',
                                    'items' => [
                                        [
                                            'label' => 'Лев',
                                            'meta' => '90% совпадений',
                                        ],
                                        [
                                            'label' => 'Стрелец',
                                            'meta' => '85% совпадений',
                                        ],
                                        [
                                            'label' => 'Близнецы',
                                            'meta' => '78% совпадений',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    private function menuItems(): array
    {
        return [
            (object) [
                'title' => 'Главная',
                'url' => '/',
                'icon' => '✦',
            ],
            (object) [
                'title' => 'Гороскопы',
                'url' => '/horoscopes',
                'icon' => '☾',
            ],
            (object) [
                'title' => 'Совместимость',
                'url' => '/compatibility',
                'icon' => '♡',
            ],
            (object) [
                'title' => 'Контакты',
                'url' => '/contacts',
                'icon' => '✉',
            ],
        ];
    }
}
