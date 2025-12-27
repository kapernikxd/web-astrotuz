<?php

namespace App\Providers;

use App\Models\MenuItem;
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
    }
}
