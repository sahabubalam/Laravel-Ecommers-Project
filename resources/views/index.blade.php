<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eCommerce HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

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


</head>
   @php
    $category=DB::table('categories')->get();
    @endphp
    
<body>
<header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
                <div class="header-top top-bg d-none d-lg-block">
                   <div class="container-fluid">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left d-flex">
                                    <div class="flag">
                                        <img src="{{asset('front/assets/img/icon/header_icon.png')}}" alt="">
                                    </div>
                                    <div class="select-this">
                                        <form action="#">
                                            <div class="select-itms">
                                                <select name="select" id="select1">
                                                    <option value="">USA</option>
                                                    <option value="">SPN</option>
                                                    <option value="">CDA</option>
                                                    <option value="">USD</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="contact-now">     
                                        <li>+8801756265446</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                   <ul>                                          
                                      
                                       <li><a href="product_list.html">Wish List  </a></li>
                                       <li><a href="cart.html">Shopping</a></li>
                                       <li><a href="cart.html">Cart</a></li>
                                       <li><a href="checkout.html">Checkout</a></li>
                                       
                                       <li>
                                       @if (Route::has('login'))
                                            <div class="header-info-right">
                                                @auth
                                               
                                                <a href="{{route('profile')}}">
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>
                                                    <a href="{{ route('logout') }}"
                                                      onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                      @csrf
                                                    </form>
                                                                
                                                @else
                                                    <a href="{{ route('login') }}">Login</a>

                                                    @if (Route::has('register'))
                                                        <a href="{{ route('register') }}">Register</a>
                                                    @endif
                                                @endauth
                                            </div>
                                        @endif
                                       </li>
                                   </ul>
                                </div>
                               
          
          
                            </div>
                       </div>
                   </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                  <a href="index.html"><img src="{{asset('front/assets/img/logo/logo.jpeg')}}" style="height:70px" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>                                                
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="{{route('categories')}}">Catagory</a>
                                            <ul class="submenu">
                                                @foreach($category as $row)
                                                    <li><a href="{{URL::to('front/product/'.$row->id)}}"> {{$row->category_name}}</a></li>                                           
                                                @endforeach
                                            </ul>
                                            </li>
                                            <li class="hot"><a href="#">Latest</a>
                                                <ul class="submenu">
                                                    <li><a href="product_list.html"> Product list</a></li>
                                                    <li><a href="single-product.html"> Product Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="blog.html">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="cart.html">Card</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                    <li><a href="about.html">About</a></li>
                                                    <li><a href="confirmation.html">Confirmation</a></li>
                                                    <li><a href="cart.html">Shopping Cart</a></li>
                                                    <li><a href="checkout.html">Product Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> 
                            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <li class="d-none d-xl-block">
                                        <div class="form-box f-right ">
                                            <input type="text" name="Search" placeholder="Search products">
                                            <div class="search-icon">
                                                <i class="fas fa-search special-tag"></i>
                                            </div>
                                        </div>
                                     </li>
                                    <li class=" d-none d-xl-block">
                                        <div class="favorit-items">
                                            <i class="far fa-heart"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-card">
                                            <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </li>
                                  <!--
                                       <li class="d-none d-lg-block"> <a href="#" class="btn header-btn">Sign in</a></li>
                                   --> 
          
                                </ul>
                            </div>
                              <!-- Mobile Menu -->
                              <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
    @yield('content')


    	     
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