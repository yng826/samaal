<html>
    <head>
        <title>App Name - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js"></script>
    </head>
    <body id="app" class="about-ir">
        <!-- {{-- @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div> --}} -->
        @include('shared.header')

        <main class="contents-wrap">
            <div class="contents-wrap__title pd-20">
               <h2 class="about-ir__title">
                   financial
                </h2>
            </div>
            <div class="contents-wrap__section">
                <h3>매출액</h3>
               <img src="https://dummyimage.com/400x600/000/fff" alt="">
               <img src="https://dummyimage.com/400x600/A00/fff" alt="">
            </div>
            <div class="contents-wrap__section">
                <h3>재무정보 3개년 요약</h3>
                <table class="table">
                    <tr>
                        <th>sdfasd</th>
                        <th>vg srg</th>
                        <th>v56yugr</th>
                        <th>5467huty</th>
                    </tr>
                    <tr>
                        <th>43,905,834</th>
                        <td>43,905,834</td>
                        <td>43,905,834</td>
                        <td>43,905,834</td>
                    </tr>
                    <tr>
                        <th>12,453,754</th>
                        <td>12,453,754</td>
                        <td>12,453,754</td>
                        <td>12,453,754</td>
                    </tr>
                    <tr>
                        <th>4,546,366</th>
                        <td>4,546,366</td>
                        <td>4,546,366</td>
                        <td>4,546,366</td>
                    </tr>
                </table>
            </div>
            <div class="contents-wrap__section">
                <h3>전자공고</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>tt5t44</th>
                            <th>tt5t44</th>
                            <th>tt5t44</th>
                            <th>tt5t44</th>
                            <th>tt5t44</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>gsf;ldkghsd;lk</td>
                            <td>gsf;ldkghsd;lk</td>
                            <td>gsf;ldkghsd;lk</td>
                            <td>gsf;ldkghsd;lk</td>
                            <td>gsf;ldkghsd;lk</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>


        @include('shared.footer')
    </body>
</html>
