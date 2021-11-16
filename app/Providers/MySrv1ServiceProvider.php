<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\MySrv1Service;

class MySrv1ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('MySrv1Service', MySrv1Service::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
