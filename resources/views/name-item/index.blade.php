<html>
    <head>
        <title>NameItem Index</title>
    </head>
    <body>
        <h1>NameItem Index</h1>
        <p>{{ $msg ?? '' }}</p>
        <form action="{{ route('name-item-store') }}" method="post">
            @csrf
            コード：<input type="text" name="code"><br>
            名前：<input type="text" name="name"><br>
            カナ：<input type="text" name="kana"><br>
            <input type="submit" value="登録">
        </form>
    </body>
</html>
