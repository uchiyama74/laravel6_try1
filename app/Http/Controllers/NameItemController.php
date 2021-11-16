<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NameItem;

class NameItemController extends Controller
{
    public function store(Request $request)
    {
        $nameItem = new NameItem();
        $nameItem->c_code = $request->code;
        $nameItem->c_name = $request->name;
        $nameItem->c_kana_name = $request->kana;
        $nameItem->save();

        $msg = "登録しました。{$nameItem->c_code}\n{$nameItem->c_name}\n{$nameItem->c_kana_name}\n";

        return view('name-item.index', [
            'msg' => $msg
        ]);
    }
}
