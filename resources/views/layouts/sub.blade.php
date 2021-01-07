<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }}</title>
        <meta property="og:image" content="{{APP_URL }}/public/img_sns_sama.png" />
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
