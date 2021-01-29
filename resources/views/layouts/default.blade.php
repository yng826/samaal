<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $meta_title ?? '' }}</title>
    <meta name="title" content="{{ $meta_title ?? '' }}">
    <meta name="description" content="{{ $meta_desc ?? '' }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="{{ $meta_title ?? '' }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $meta_desc ?? '' }}">
    <meta property="og:id" content="sama">
    <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
    <link rel="icon" href="/kor/images/favicon.ico" type="image/x-icon">
    <title>{{ config('app.name', '삼아알미늄') }}</title>
    <!-- Styles -->
    <link href="/kor/css/app.css" rel="stylesheet">
    @include('shared.gtm-header')
</head>
<body class={{ $bodyClass ?? '' }}>
    <div id="app">
        @include('shared.header')

        @yield('contents')

        @include('shared.footer')
        @yield('popup-container')
    </div>


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
