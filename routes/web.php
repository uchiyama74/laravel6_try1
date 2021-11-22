<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/try1', 'Try1Controller@index');
Route::get('/try1/my-srv1', 'Try1Controller@mySrv1');

Route::get('/my-validate-1', 'MyValidate1Controller@index');
// Route::post('/my-validate-1/save', 'MyValidate1Controller@save');
Route::post('/my-validate-1/save', 'MyValidate1Controller@save')->middleware('checkage');

Route::get('/name-item', function () {
    // logger(session()->all());
    return view('name-item.index', ['lastShowId' => session('lastShowId', null)]);
});
Route::post('/name-item/store', 'NameItemController@store')->name('name-item-store');
Route::get('/name-item/show/{nameItem}', 'NameItemController@show')->name('name-item-show');

Route::get('/post/create', 'PostController@create');
Route::post('/post/store', 'PostController@store');
