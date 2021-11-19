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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');
Route::get('/home/my-srv1', 'HomeController@mySrv1');

Route::get('/my-validate-1', 'MyValidate1Controller@index');
// Route::post('/my-validate-1/save', 'MyValidate1Controller@save');
Route::post('/my-validate-1/save', 'MyValidate1Controller@save')->middleware('checkage');

Route::get('/name-item', function () { return view('name-item.index'); });
Route::post('/name-item/store', 'NameItemController@store')->name('name-item-store');
Route::get('/name-item/show/{nameItem}', 'NameItemController@show');
