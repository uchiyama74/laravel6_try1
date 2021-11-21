@extends('layouts.my_layout')

@section('title', 'Home Index')

@section('sidebar')
    @parent

    <p>ここはメインのサイド・バーに追加される。</p>
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>
    @component('components.my_alert', ['mySlot2' => 'mySlot2Value'])
        @slot('mySlot') My Slot say @endslot
        <span><strong>Whoops!</strong> Something went wrong!</span>
    @endcomponent
    @my_direct_alert
        <span>My Direct Alert 2.</span>
    @endmy_direct_alert
    <em>{{ $postBody }}</em>
@endsection

