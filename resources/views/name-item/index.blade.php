<html>
    <head>
        <title>{{ $titlePrefix }} NameItem Index</title>
    </head>
    <body>
        <h1>{{ $titlePrefix }} NameItem Index</h1>
        @error('code')
        <div>{{ $message }}</div>
        @enderror
        @error('name')
        <div>{{ $message }}</div>
        @enderror
        @error('kana')
        <div>{{ $message }}</div>
        @enderror
        <pre>{{ $msg ?? '' }}</pre>
        @cannot('create', ['App\NameItem', 'foo2'])
        <div>あなたは新規登録できません。</div><br>
        @endcannot
        @if (isset($lastShowId))
        <div>Last Show ID：{{ $lastShowId }}</div><br>
        @endif
        @if (isset($showUrl))
        <div><a href="{{ $showUrl }}">Signed Show URL here.</a></div><br>
        @endif
        <form action="{{ route('name-item-store') }}" method="post">
            @csrf
            コード：<input type="text" name="code" value="{{ old('code') }}"><br>
            氏名：<input type="text" name="name" value="{{ old('name') }}"><br>
            カナ：<input type="text" name="kana" value="{{ old('kana') }}"><br>
            <input type="submit" value="登録">
        </form>
    </body>
</html>
