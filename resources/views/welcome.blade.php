<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('icona.png') }}">

        <title>Mappin</title>


        <!-- Styles -->
        <style>
            html, body {
                /*background-image: url("https://images.pexels.com/photos/414171/pexels-photo-414171.jpeg");*/
                background-size: cover;
                background-color: #000000;
                color: #ffffff;
                font-family: 'Roboto', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 150px;
                position: relative;
                z-index: 1;
            }

            .links > a {
                color: #FFFFFF;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                position: relative;
                z-index: 1;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #logo {
                height: 20%;
                width: 20%;
                position: relative;
                z-index: 1;
            }
            #video {
            position: fixed; right: 0; bottom: 0;
            min-width: 100%; min-height: 100%;
            width: auto; height: auto; z-index: -100;
            background-size: cover;
            z-index: 0;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            <div class="content">
                <img id="logo" src="{{ asset('images/logopositivo.png') }}">
                <div class="title m-b-md">
                    Mappin
                </div>
                <video autoplay loop muted id="video">
                <source src="videos/mappin.mp4" type="video/mp4" />
                </video>
            </div>
        </div>
        <script src="login.js"></script>
    </body>
</html>
