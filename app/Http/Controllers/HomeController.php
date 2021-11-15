<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        // $message = 'Hello Laravel6 Try1.';
        $message = Post::where('title', 'Title1')->first()->body;
        return view('home.index', ['message' => $message]);
    }
}
