<html>
    <head>
        <title>Post Create</title>
    </head>
    <body>
        <h1>Post Create</h1>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <p>{{ $resultMsg ?? '' }}</p>
        <form action="/post/store" method="POST">
            @csrf
            タイトル：<input type="text" name="title"><br>
            本文：<textarea name="body"></textarea><br>
            <input type="submit" value="登録">
        </form>
    </body>
</html>
