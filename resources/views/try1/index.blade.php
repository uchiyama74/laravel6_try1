@extends('layouts.my_layout')

@section('title', 'Home Index')

@section('sidebar')
    @parent

    <p>ここはメインのサイド・バーに追加される。</p>
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>
    <br>
    <p><em>{{ $msg ?? '' }}</em></p>
    <br>
    @component('components.my_alert', ['mySlot2' => 'mySlot2Value'])
    @slot('mySlot') My Slot say @endslot
    <span><strong>Whoops!</strong> Something went wrong!</span>
    @endcomponent
    @my_direct_alert
    <span>My Direct Alert 2.</span>
    @endmy_direct_alert
    <br>
    @auth
    <a href="/try1/mail">MyTry1Mailを送信する。</a><br>
    <br>
    @endauth
    @if ($storageTry1TxtUrl)
    リンク：<a href="{!! $storageTry1TxtUrl !!}">storage_try1.txt</a><br>
    ダウンロード：<a href="/downloads/storage-try1.txt">storage_try1.txt</a><br>
    <br>
    @endif
@endsection
