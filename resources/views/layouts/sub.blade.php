<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }}</title>
        <meta property="og:title" content="SAMA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="SAMA">
        <meta property="og:id" content="sama">
        <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
        <link rel="stylesheet" href="/eng/css/app.css">
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
