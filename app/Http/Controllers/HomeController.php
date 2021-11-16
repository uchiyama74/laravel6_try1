<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Services\MySrv1Service;

class HomeController extends Controller
{
    protected $mySrv1Service;

    public function __construct(MySrv1Service $mySrv1Service)
    {
        $this->mySrv1Service = $mySrv1Service;
    }

    public function index()
    {
        // $message = 'Hello Laravel6 Try1.';
        $message = Post::where('title', 'Title1')->first()->body;
        return view('home.index', ['message' => $message]);
    }

    public function mySrv1()
    {
        return view('home.my-srv1', [
            'myDate' => $this->mySrv1Service->getDate(),
            'myArray' => $this->mySrv1Service->getArray()
        ]);
    }
}
