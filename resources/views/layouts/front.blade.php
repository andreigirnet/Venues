<!DOCTYPE html>
<html lang="en">
<head>
    <title>Venue Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="{{ asset('/public/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/fl-bigmug-line.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/slide.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="/public/css/hovers.css">
</head>
<body>

<div class="site-loader"></div>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="border-bottom bg-white top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-6">
                    <p class="mb-0">
                        <a href="#" class="mr-3"><span class="text-black fl-bigmug-line-phone351"></span> <span class="d-none d-md-inline-block ml-2">+2 102 3923 3922</span></a>
                        <a href="#"><span class="text-black fl-bigmug-line-email64"></span> <span class="d-none d-md-inline-block ml-2">info@domain.com</span></a>
                    </p>
                </div>
                <div  style="display: flex; align-items: center">
                    @auth
                    <div>Hello {{auth()->user()->name}} |</div>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="ml-2 bg-orange" id="button-logout" style="background-color: orange; border-radius: 10px; border-color: brown; color:white; cursor: pointer; ">Log out</button>
                        </form>
                    @else
                    <div><a href="{{ route('login') }}">Login </a></div>
                    <div class="ml-1"> / </div>
                    <div ><a class="ml-1" href="{{route('register')}}"> Register</a></div>
                    @endauth
                </div>
                <div class="col-4 col-md-3 text-right">
                    <a href="#" class="mr-3"><span class="text-black icon-facebook"></span></a>
                    <a href="#" class="mr-3"><span class="text-black icon-twitter"></span></a>
                    <a href="#" class="mr-0"><span class="text-black icon-linkedin"></span></a>
                </div>
            </div>
        </div>

    </div>
    <div class="site-navbar">
        <div class="container py-1">
            <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">
                    <h1 class=""><a href="/" class="h5 text-uppercase text-black"><strong>{{ config('app.name') }}<span class="text-danger"></span></strong></a></h1>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                    <nav class="site-navigation text-right text-md-right" role="navigation">

                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            @if(auth()->check())
                            <li class="has-children">
                                <a href="{{route('user.create')}}">List a venue</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('user.index')}}">Dashboard</a></li>
                                </ul>
                            </li>
                            @else
                                <li><a href="{{route('register')}}">List a Venue</a></li>
                            @endif
                            <li class="has-children">
                                <a href="/">Locations</a>
                                <ul class="dropdown">
                                    @foreach($globalLocations as $location)
                                        <li><a href="{{route('location', $location->slug)}}">{{$location->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="/">Event Types</a>
                                <ul class="dropdown">
                                    @foreach($globalEventTypes as $event)
                                        <li><a href="{{route('event_type', $event->slug)}}">{{$event->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                            @if(auth()->check() && auth()->user()->is_admin )
                            <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>


            </div>
        </div>
    </div>
</div>

@yield('content')

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="mb-5">
                    <h3 class="footer-heading mb-4">About Project</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
                </div>



            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4">Locations</h3>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <ul class="list-unstyled">
                            @foreach($globalLocations as $location)
                                <li><a href="{{route('location', $location->slug)}}">{{$location->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-6">

                        <ul class="list-unstyled">
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>


            </div>

            <div class="col-lg-4 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4">Follow Us</h3>

                <div>
                    <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>



            </div>


            </div>
        </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js" integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('/public/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/public/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('/public/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/public/js/popper.min.js') }}"></script>
<script src="{{ asset('/public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/public/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/public/js/mediaelement-and-player.min.js') }}"></script>
<script src="{{ asset('/public/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('/public/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('/public/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/public/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/public/js/aos.js') }}"></script>

<script src="{{ asset('/public/js/main-front.js') }}"></script>




</body>
</html>
