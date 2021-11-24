<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Post;
use App\Mail\MyTry1Mail;
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
        // $postBody = Post::where('title', 'Title1')->first()->body;
        // return view('try1.index', ['postBody' => $postBody]);
        return view('try1.index');
    }

    public function mail(Request $request)
    {
        Mail::to($request->user())->send(new MyTry1Mail($request->user()));

        return view('try1.index', ['msg' => 'MyTry1Mailを送信しました。']);
    }

    public function mySrv1()
    {
        return view('try1.my-srv1', [
            'myDate' => $this->mySrv1Service->getDate(),
            'myArray' => $this->mySrv1Service->getArray()
        ]);
    }
}
