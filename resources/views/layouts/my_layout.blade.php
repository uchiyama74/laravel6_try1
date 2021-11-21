<html>
    <head>
        <title>Lara6 Try1 - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            <p>ここがメインのサイド・バーです。</p>
        @show

        <div>
            @yield('content')
        </div>
    </body>
</html>
