<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="삼아알미늄">
    <meta property="og:type" content="website">
    <meta property="og:description" content="삼아알미늄">
    <meta property="og:id" content="sama">
    <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <title>{{ config('app.name', '삼아알미늄') }}</title>
    <!-- Styles -->
    <link href="/kor/css/app.css" rel="stylesheet">
</head>
<body class={{ $bodyClass ?? '' }}>
    <div id="app">
        @include('shared.header')

        @yield('contents')

        @include('shared.footer')
    </div>

    @yield('popup-container')
    @section('script')
    <!-- Scripts -->
    <script src="/kor/js/manifest.js"></script>
    <script src="/kor/js/vendor.js"></script>
    <script src="/kor/js/app.js"></script>
    <script src="/kor/js/question.js"></script>
    <!-- Scripts -->
    @show
</body>
</html>
