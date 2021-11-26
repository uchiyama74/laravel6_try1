<!DOCTYPE html>
<html>
    <head>
        <title>Try1 Upload Form</title>
    </head>
    <body>
        <h1>Try1 Upload Form</h1>
        <p>{{ $msg ?? '' }}</p>
        <form action="/try1/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="uploadFile"><br>
            <input type="submit" value="送信"><br>
        </form>
    </body>
</html>
