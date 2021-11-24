<!doctype html>
<html>
    <head>
        <title>My Try1 Mail</title>
    </head>
    <body>
        <p><em>こんにちは {{ $user->name }} さん</em></p>
        <p>This is a MyTry1HtmlMail.</p>
        <p>{{ config('app.name') }}</p>
    </body>
</html>
