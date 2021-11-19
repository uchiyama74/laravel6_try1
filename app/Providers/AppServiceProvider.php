<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
