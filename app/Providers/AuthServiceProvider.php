<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\NameItem' => 'App\Policies\NameItemPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::viaRequest('my-auth', function ($request) {
// logger('---my-auth');
            return User::where('id', $request->query('userId'))->first();
        });

        Gate::define('my-gate1', function ($user) {
// logger('---my-gate1');
            // return $user->id > 1;
            if ($user->id !== 3) {
                return Response::allow();
            } else {
                return Response::deny("{$user->name}には権限がありません。");
            }
        });
    }
}
