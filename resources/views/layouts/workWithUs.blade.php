<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="SAMA">
    <meta property="og:type" content="website">
    <meta property="og:description" content="SAMA">
    <meta property="og:id" content="sama">
    <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
    <link rel="icon" href="/eng/images/favicon.ico" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>삼아알미늄</title>
    <!-- Styles -->
    <link href="/eng/css/app.css" rel="stylesheet">
</head>
<body>
    @include('shared.header')

    <div id="app">
        @section('main')
        @show

        @include('shared.footer')
    </div>
    @section('script')
    <!-- Scripts -->
    <script src="/eng/js/manifest.js" defer></script>
    <script src="/eng/js/vendor.js" defer></script>
    <script src="/eng/js/app.js" defer></script>
    <script src="/eng/js/question.js"></script>
    @show
</body>
</html>
