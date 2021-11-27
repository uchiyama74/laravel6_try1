<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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
        $storageTry1TxtUrl = Storage::url('public/storage_try1.txt');

        return view('try1.index', ['storageTry1TxtUrl' => $storageTry1TxtUrl]);
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

    public function upload(Request $request)
    {
        if (!$request->hasFile('uploadFile')) {
            return view('try1.upload-form', ['msg' => 'ファイルを選択してください。']);
        }

        $uploadFile = $request->file('uploadFile');
        if (!$uploadFile->isValid()) {
            return view('try1.upload-form', ['msg' => 'アップロードが失敗しました。']);
        }

        $uploadedPath = $uploadFile->store('uploaded');
        if (!$uploadedPath) {
            return view('try1.upload-form', ['msg' => 'アップロードの保存が失敗しました。']);
        }

        return view('try1.upload-form', ['msg' => "アップロードが成功しました。（{$uploadedPath}）"]);
    }

    public function pushTry1Job()
    {
        \App\Jobs\Try1Job::dispatch()->onConnection('redis')->delay(60);

        return view('try1.index', ['msg' => 'Try1Jobを投入しました。']);
    }
}
