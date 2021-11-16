<html>
    <head>
        <title>MySrv1</title>
    </head>
    <body>
        <div>myDate: {{ $myDate }}</div>
        <div>myArray:</div>
        <ul>
            @foreach ($myArray as $key => $value)
            <li>{{ $key }}: {{ $value }}</li>
            @endforeach
        </ul>
    </body>
</html>
