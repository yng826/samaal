<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
    <meta property="og:title" content="삼아알미늄">
    <meta property="og:type" content="website">
    <meta property="og:description" content="삼아알미늄">
    <meta property="og:id" content="sama">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <title>Document</title>

    <link rel="stylesheet" href="/kor/css/vendor.css">
</head>
<body>
    <div id="app">
        <h1>hello</h1>
        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
    <div id="apps"></div>
    <script src="/kor/js/admin/manifest.js"></script>
    <script src="/kor/js/vendor.js"></script>
    <script src="/kor/js/recruit.js"></script>
</body>
</html>

