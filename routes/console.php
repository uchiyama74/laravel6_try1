<?php

use Illuminate\Foundation\Inspiring;
use App\User;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('user-name {user}', function () {
    $user = User::find($this->argument('user'));
    if (!$user) {
        $this->error("引数「user」が不正です。");
        return 1;
    }

    $this->info("{$user->id}：{$user->name}");
    return 0;
});
