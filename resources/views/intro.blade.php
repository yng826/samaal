<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:title" content="SAMA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="SAMA">
        <meta property="og:id" content="sama">
        <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
        <link rel="stylesheet" href="/css/app.css">
        <script src="js/app.js"></script>
    </head>
    <body>
        <div class="intro-section">
            @include('shared.header')

            <main class="intro-wrap">
               <section class="intro-wrap__section">
                    <div class="intro-wrap__section--left">
                        <p>
                            The future presents us with many uncertainties,<br>
                            but it also gifts us with opportunities to exercise our limitless imagination and tackle new challenges.
                        </p>
                        <p>
                            "Safely preserving our customers' needs with mobile ease"<br>
                            is what we promise to achieve through our mission.
                        </p>
                        <p>
                            With technological innovations that help generate life’s values and conveniences,
                        </p>
                        <p class="important-text">
                            <span>Sama takes a new leap forward,</span><br>
                            preserving social and environmental standards that contributes to a better world,<br>
                            all the while sustaining profitability as a business.
                        </p>
                    </div>
                    <div class="intro-wrap__section--right">
                        <p>
                            We are contributing to the national economy <br>
                            by increasing quality jobs using the world's top-class technology.
                        </p>
                        <p>
                            By reducing food waste by extending the shelf life of<br>
                            food through high-quality aluminium foil and packaging material production technology, <br>
                            we are helping to protect the environment.
                        </p>
                        <p>
                            Making food move through the value chain more<br>
                            efficiently helps provide better, safer nutrition for people.
                        </p>
                        <p>
                            Advanced technology for secondary battery cathode<br>
                            foil makes a significant contribution to the supply of <br>
                            eco-friendly energy by efficiently using limited resources.
                        </p>
                        <p class="important-text">
                            <span>This is why Sama exists in a sustainable world,</span><br>
                            encouraging societal change beyond just creating the<br>
                            best products.
                        </p>
                    </div>
               </section>
            </main>
            @include('shared.footer')
        </div>
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/question.js')}}"></script>
    </body>
</html>
