<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MySrv2Service;

class MySrv2ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('MySrv2Service', function ($app) {
            return new MySrv2Service($app->make('MySrv1Service'));
        });
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
