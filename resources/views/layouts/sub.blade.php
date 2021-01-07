<html>
    <head>
        <meta property="og:title" content="삼아알미늄">
        <meta property="og:type" content="website">
        <meta property="og:description" content="삼아알미늄">
        <meta property="og:id" content="sama">
        <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
        <link rel="stylesheet" href="/css/app.css">
        <title>{{ config('app.name', '삼아알미늄') }}</title>
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
