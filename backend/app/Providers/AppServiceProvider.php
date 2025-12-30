<?php

namespace App\Providers;

use App\Models\LeftSidebarCard;
use App\Models\MenuItem;
use App\Models\RightSidebarBlock;
use App\Models\FooterSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['partials.topbar', 'partials.mobile-menu'], function ($view) {
            $menuItems = collect();

            if (Schema::hasTable('menu_items')) {
                $menuItems = MenuItem::query()
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->orderBy('title')
                    ->get();
            }

            $view->with('menuItems', $menuItems);
        });

        View::composer(['layouts.page-main'], function ($view) {
            $leftSidebarCards = collect();
            $rightSidebarBlocks = collect();

            if (Schema::hasTable('left_sidebar_cards')) {
                $leftSidebarCards = LeftSidebarCard::query()
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->orderBy('title')
                    ->get();
            }

            if (Schema::hasTable('right_sidebar_blocks')) {
                $rightSidebarBlocks = RightSidebarBlock::query()
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->orderBy('title')
                    ->get();
            }

            $view->with('leftSidebarCards', $leftSidebarCards);
            $view->with('rightSidebarBlocks', $rightSidebarBlocks);
        });

        View::composer(['partials.footer'], function ($view) {
            $footerSetting = null;

            if (Schema::hasTable('footer_settings')) {
                $footerSetting = FooterSetting::query()
                    ->where('is_active', true)
                    ->orderByDesc('updated_at')
                    ->first();

                if (!$footerSetting) {
                    $footerSetting = new FooterSetting([
                        'title' => 'Astrotuz',
                        'description' => 'Астрологические подсказки, дневные гороскопы и вдохновение для каждого дня.',
                        'primary_links' => [],
                        'secondary_links' => [],
                        'social_links' => [],
                        'copyright_line' => '© ' . now()->year . ' Astrotuz. Все права защищены.',
                        'is_active' => true,
                    ]);
                }
            }

            $view->with('footerSetting', $footerSetting);
        });
    }
}
