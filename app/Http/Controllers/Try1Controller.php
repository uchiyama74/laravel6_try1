<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Services\MySrv1Service;

class Try1Controller extends Controller
{
    protected $mySrv1Service;

    public function __construct(MySrv1Service $mySrv1Service)
    {
        $this->mySrv1Service = $mySrv1Service;
    }

    public function index()
    {
        $postBody = Post::where('title', 'Title1')->first()->body;
        return view('try1.index', ['postBody' => $postBody]);
    }

    public function mySrv1()
    {
        return view('try1.my-srv1', [
            'myDate' => $this->mySrv1Service->getDate(),
            'myArray' => $this->mySrv1Service->getArray()
        ]);
    }
}
