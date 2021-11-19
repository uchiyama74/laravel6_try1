<html>
    <head>
        <title>MyValidate1 Index</title>
    </head>
    <body>
        <h1>MyValidate1 Index</h1>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <pre>{{ $msg ?? '' }}</pre>
        <form action="/my-validate-1/save" method="post">
            {{ csrf_field() }}
            氏名：<input type="text" name="name"><br>
            年齢：<input type="text" name="age"><br>
            性別：<input type="text" name="sex"><br>
            <input type="submit" value="登録">
        </form>
    </body>
</html>
