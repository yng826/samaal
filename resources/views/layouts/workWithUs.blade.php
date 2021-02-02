<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>삼아알미늄 | 채용</title>
    <meta charset="utf-8">
    <meta name="title" content="삼아알미늄 | 채용">
    <meta name="description" content="채용">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="삼아알미늄 | 채용">
    <meta property="og:type" content="website">
    <meta property="og:description" content="채용">
    <meta property="og:id" content="sama">
    <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
    <link rel="icon" href="/kor/images/favicon.ico" type="image/x-icon">
    <!-- Styles -->
    <link href="/kor/css/app.css" rel="stylesheet">
    @include('shared.gtm-header')
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
    <script src="/kor/js/manifest.js" defer></script>
    <script src="/kor/js/vendor.js" defer></script>
    <script src="/kor/js/app.js" defer></script>
    <script src="/kor/js/question.js"></script>
    @show
</body>
</html>
