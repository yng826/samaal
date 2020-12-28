<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }}</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
