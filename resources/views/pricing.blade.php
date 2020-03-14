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
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        

        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .pricing .card {
            border: none;
            border-radius: 1rem;
            transition: all 0.2s;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }

        .pricing hr {
            margin: 1.5rem 0;
        }

        .pricing .card-title {
            margin: 0.5rem 0;
            font-size: 0.9rem;
            letter-spacing: .1rem;
            font-weight: bold;
        }

        .pricing .card-price {
            font-size: 3rem;
            margin: 0;
        }

        .pricing .card-price .period {
            font-size: 0.8rem;
        }

        .pricing ul li {
            margin-bottom: 1rem;
        }

        .pricing .text-muted {
            opacity: 0.7;
        }

        .pricing .btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            opacity: 0.7;
            transition: all 0.2s;
        }

        /* Hover Effects on Card */

        @media (min-width: 1024px) {
            .pricing .card:hover {
                margin-top: -.25rem;
                margin-bottom: .25rem;
                box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
            }

            .pricing .card:hover .btn {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ url('/home') }}">HOME <span class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
                        </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('register') }}">Register <span class="sr-only">(current)</span></a>
                        </li>
                    @endif
                    @endauth
                @endif
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="{{ url('/pricing') }}">PRICING <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="flex-center position-ref full-height">

        <section class="pricing py-5">
            <div class="container">
                <div class="row">
                    <!-- Free Tier -->
                    <div class="col-lg-4">
                        <div class="card my-5 mx-3 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Basic</h5>
                                <h6 class="card-price text-center"><span class="period">Rp. </span>0<span class="period">rb/bln</span></h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li> <span class="fa-li"><i class="fas fa-check"></i></span> <strong>Random Number</strong> </li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Message 100/day</li>
                                    <li><span class="fa-li"><i class="fas fa-times"></i></span>Priority Sending</li>
                                    <li><span class="fa-li"><i class="fas fa-times"></i></span>Free Support</li>
                                </ul>
                                <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a>
                            </div>
                        </div>
                    </div>
                    <!-- Plus Tier -->
                    <div class="col-lg-4">
                        <div class="card my-5 mx-3 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">
                                    Priority
                                    <span class="badge badge-pill badge-success">Best Seller</span>
                                </h5>
                                <h6 class="card-price text-center"><span class="period">Rp. </span>50<span class="period">rb/bln</span></h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li> <span class="fa-li"><i class="fas fa-check"></i></span> <strong>Random Number</strong> </li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Message 1000/day</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Priority Sending</li>
                                    <li><span class="fa-li"><i class="fas fa-times"></i></span>Free Support</li>
                                </ul>
                                <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a>
                            </div>
                        </div>
                    </div>
                    <!-- Pro Tier -->
                    <div class="col-lg-4">
                        <div class="card my-5 mx-3">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Ultimate</h5>
                                <h6 class="card-price text-center"><span class="period">Rp. </span>100<span class="period">rb/bln</span></h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Random/Specific Number</strong></li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Message 2000/day</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Priority Sending</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Support</li>
                                    
                                </ul>
                                <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

</html>