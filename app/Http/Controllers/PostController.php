<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Post;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

    public function store(StorePost $request)
    {
        Gate::before(function ($user, $ability) {
            // return true;
        });

        Gate::after(function ($user, $ability, $result, $arguments) {
            // logger('---Gate::after result: ' . var_export($result, true));
        });

        // if (Gate::denies('my-gate1')) {
        //     return view('post.create', ['resultMsg' => 'あなたは登録できません。']);
        // }
        Gate::authorize('my-gate1');

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return view('post.create', [
            'resultMsg' => '登録しました。'
        ]);
    }

    public function list()
    {
        $postsPaginator = DB::table('posts')->paginate(3);
        // $postsPaginator = DB::table('posts')->simplePaginate(2);

        return view('post.list', ['postsPaginator' => $postsPaginator]);
    }
}
