<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use App\NameItem;
use App\User;
use App\Rules\KanjiName;
use App\Notifications\Try1Notice;

class NameItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'alpha_dash|min:4|max:10',
            'name' => ['min:3', 'max:20', new KanjiName],
            'kana' => 'min:3|max:20|regex:/^[ァ-ヶ 　]+$/u'
        ]);

        $nameItem = NameItem::where('c_code', $request->code)->first();
        if (!$nameItem) {
            $this->authorize('create', ['App\NameItem', 'foo']);
            $nameItem = new NameItem();
            // $this->authorize('create', $nameItem);
            $nameItem->c_code = $request->code;
            $nameItem->c_name = $request->name;
            $nameItem->c_kana_name = $request->kana;
            if (Auth::check()) {
                $nameItem->owner_id = $request->user()->id;
            }
            $nameItem->save();
        } else {
            $this->authorize('update', $nameItem);
            // Gate::authorize('update', $nameItem);
            $nameItem->c_name = $request->name;
            $nameItem->c_kana_name = $request->kana;
            $nameItem->update();
        }

        $msg = "保存しました。\n{$nameItem->c_code}\n{$nameItem->c_name}\n{$nameItem->c_kana_name}\n";

        $showUrl = URL::temporarySignedRoute('name-item-show', now()->addMinutes(1), ['nameItem' => $nameItem, 'signedFlag' => '1']);

        return view('name-item.index', [
            'msg' => $msg,
            'showUrl' => $showUrl
        ]);
    }

    public function show(Request $request, NameItem $nameItem)
    {
        if ($request->query('signedFlag', '0') && !$request->hasValidSignature()) {
            abort(401);
        }

        $request->session()->put('lastShowId', $nameItem->id);
        $request->session()->push('lastShowNameItem.c_code', $nameItem->c_code);
        $request->session()->push('lastShowNameItem.c_name', $nameItem->c_name);

        $msg = "取得しました。\n{$nameItem->c_code}\n{$nameItem->c_name}\n{$nameItem->c_kana_name}\n";

        return view('name-item.index', [
            'msg' => $msg,
            'nameItem' => $nameItem
        ]);
    }

    public function sendTry1Notice(Request $request, NameItem $nameItem)
    {
        // $request->user()->notifyNow(new Try1Notice());
        $emailTo = User::findOrFail($nameItem->owner_id)->email;
        Notification::route('mail', $emailTo)->notifyNow(new Try1Notice());

        return $this->show($request, $nameItem);
    }
}
