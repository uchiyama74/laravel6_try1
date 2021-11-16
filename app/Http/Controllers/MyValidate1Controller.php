<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyValidate1Controller extends Controller
{
    public function index()
    {
        return view('myvalidate1.index');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'integer | between:0,150',
            'sex' => ['max:1', 'regex:/^[男|女]+$/u']
        ]
/*
        ,[
            'name.required' => '名前を入力してください。',
            'age.numeric' => '整数で入力してください。',
            'age.between' => '0から150で入力してください。',
            'sex.regex' => '男か女で入力してください。'
        ]
*/
        );

        return view('myvalidate1.index', ['msg' => 'OK']);
    }
}
