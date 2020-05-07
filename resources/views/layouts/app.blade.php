<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSS here after customize -->
        <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/slicknav.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>




    <!-- JS here after customize -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('front/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('front/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('front/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('front/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/assets/js/slick.min.js')}}"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('front/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('front/assets/js/animated.headline.js')}}"></script>
    
    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('front/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('front/assets/js/contact.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('front/assets/js/mail-script.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{asset('front/assets/js/plugins.js')}}"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>
</body>

</html>
