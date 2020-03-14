<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
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
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
            <a href="{{ url('/pricing') }}">Pricing</a>
        </div>
        @endif

        <div class="content">
            <div class="h1 col align-self-center mb-5">
                Programmatic Whatsapp Messenger
            </div>
            <footer>
                <div class="col-md-auto">
                    <p>PWM tidak berafiliasi dengan WhatsApp, Facebook, atau mitra pihak ketiga mana pun dengan cara apa pun.
                    Merupakan tanggung jawab Anda sepenuhnya untuk mematuhi peraturan WhatsApp dan undang-undang apa pun yang Anda ikuti.
                    Anda menggunakan perangkat lunak kami dengan risiko Anda sendiri.
                    Kami percaya tanggung jawab adalah milik Anda sendiri dan kami tidak bertanggung jawab atas tindakan Anda dan konsekuensinya.
                    Kami tidak dapat disalahkan dalam kasus akun Anda kemungkinan akan diblokir karena alasan apa pun.
                    Tidak ada jaminan pengoperasian perangkat lunak yang berkelanjutan, tanpa gangguan atau bebas kesalahan.</p>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>