<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

    public function store(StorePost $request)
    {

        return view('post.create', [
            'resultMsg' => '登録しました。'
        ]);
    }
}
