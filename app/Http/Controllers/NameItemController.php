<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NameItem;
use App\Rules\KanjiName;

class NameItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'alpha_dash|min:4|max:10',
            'name' => ['min:3', 'max:20', new KanjiName],
            'kana' => 'min:3|max:20|regex:/^[ァ-ヶ 　]+$/u'
        ]);

        $nameItem = new NameItem();
        $nameItem->c_code = $request->code;
        $nameItem->c_name = $request->name;
        $nameItem->c_kana_name = $request->kana;
        $nameItem->save();

        $msg = "登録しました。\n{$nameItem->c_code}\n{$nameItem->c_name}\n{$nameItem->c_kana_name}\n";

        return view('name-item.index', [
            'msg' => $msg
        ]);
    }

    public function show(NameItem $nameItem)
    {
        $msg = "取得しました。\n{$nameItem->c_code}\n{$nameItem->c_name}\n{$nameItem->c_kana_name}\n";

        return view('name-item.index', [
            'msg' => $msg
        ]);
    }
}
