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


/* try1 */
Route::get('/try1', 'Try1Controller@index');
// Route::get('/try1', 'Try1Controller@index')->middleware('auth:api');
Route::get('/try1/mail', 'Try1Controller@mail')->middleware('auth');
Route::get('/try1/my-srv1', 'Try1Controller@mySrv1');
Route::get('/try1/upload-form', function () {
    return view('try1.upload-form');
});
Route::post('/try1/upload', 'Try1Controller@upload');
Route::get('/try1/push-try1-job', 'Try1Controller@pushTry1Job');

Route::get('/my-try1-mail/preview/{user}', function (App\User $user) {
    return new App\Mail\MyTry1Mail($user);
});


/* my-validate-1 */
Route::get('/my-validate-1', 'MyValidate1Controller@index')->middleware('auth.basic');
// Route::post('/my-validate-1/save', 'MyValidate1Controller@save');
Route::post('/my-validate-1/save', 'MyValidate1Controller@save')->middleware('checkage');


/* name-item */
Route::get('/name-item', function () {
    // logger(session()->all());
    return view('name-item.index', ['lastShowId' => session('lastShowId', null)]);
});
Route::post('/name-item/store', 'NameItemController@store')->name('name-item-store');
// Route::get('/name-item/show/{nameItem}', 'NameItemController@show')->name('name-item-show')->middleware('password.confirm');
Route::get('/name-item/show/{nameItem}', 'NameItemController@show')->name('name-item-show')->middleware('can:view,nameItem');
Route::get('/name-item/send-try1-notice/{nameItem}', 'NameItemController@sendTry1Notice');


/* post */
Route::middleware(['auth'])->group(function () {
    Route::get('/post/create', 'PostController@create');
    Route::post('/post/store', 'PostController@store');
    Route::get('/post/list', 'PostController@list');
    Route::get('/post/json/{postId}', function () {
        $post = \App\Post::withTrashed()->find(request('postId'));
        return new \App\Http\Resources\PostResource($post);
    });
    Route::get('/posts/json', function () {
        $posts = \App\Post::all();
        return \App\Http\Resources\PostResource::collection($posts->keyBy('created_at')->sortByDesc('created_at'))
            ->additional(['meta' => [
                'key2' => 'value2',
            ]]);
    });
    Route::get('/post/list/json', function () {
        // $posts = \App\Post::all();
        $posts = \App\Post::paginate(5);
        return new \App\Http\Resources\PostsResource($posts);
    });
});


/* downloads */
Route::get('/downloads/storage-try1.txt', function () {
    return Storage::download('public/storage_try1.txt');
});

// Route::get('/downloads/storage-sftp-try1.txt', function () {
//     return Storage::disk('sftp')->download('storage_sftp_try1.txt');
// });
