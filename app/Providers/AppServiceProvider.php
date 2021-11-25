<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Post::observe(\App\Observers\PostObserver::class);

        // Paginator::defaultView('vendor.pagination.default');
        // Paginator::defaultSimpleView('vendor.pagination.simple-default');

        Blade::component('components.my_alert', 'my_direct_alert');

        View::share('titlePrefix', '【Laravel6Try1】');

        View::composer('name-item.index', function ($view) {
            if (!$view->offsetExists('msg')) return;

            $msg = $view->offsetGet('msg');
            if ($msg) {
                $msg = "※{$msg}\n";
                $view->with('msg', $msg);
            }
        });
    }
}
