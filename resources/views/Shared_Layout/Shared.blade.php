<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    {{-- To make title shared and daynamic between all views --}}
    <!-- title -->
    <title>@yield('Title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<!-- Slick CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->

                        <div class="site-logo">
                            <a href="/">
                              <img src="{{ asset($setting->logo) }}" alt="Logo">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="menu-item-has-children">
                                    <a href="#">@lang('messages.Language')</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('lang.switch', 'en') }}">@lang('messages.English')</a></li>
                                        <li><a href="{{ route('lang.switch', 'ar') }}">@lang('messages.Arabic')</a></li>
                                    </ul>
                               


                                <li><a href="/">@lang('messages.Home')</a></li>
                                <li><a href="{{ route('Prodect.CatId') }}">@lang('messages.Products')</a></li>
                                <li><a href="{{ route('Category.GetAll') }}">@lang('messages.Categories')</a></li>
                                <li><a href="{{ route('ContactUs') }}">@lang('messages.Contact Us')</a></li>
                                @guest
                                    @if (Route::has('login'))
                                        <li> {{-- If li in main-menu take class give same to li in login,register,logout --}}
                                            <a href="{{ route('login') }}">@lang('messages.Login')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active"
                                                href="{{ route('register') }}">@lang('messages.Register')</a>
                                        </li>
                                    @endif

                                    {{-- @if (Route::has('register'))
                                    <li >
                                        <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif --}}
                                @else
                                    <li>
                                        <a href="#">
                                            {{ Auth::user()->name }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            @lang('messages.Logout') 
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>

                                @endguest
                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="{{ route('Cart.Index') }}"><i
                                                class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon" href="#"><i
                                                class="fas fa-search"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>

                            <form action="{{ route('products.search') }}" method="POST">
                                @csrf
                                <input type="text" placeholder="Get Your Product" name="Search">
                                <button type="submit">@lang('messages.Search') <i class="fas fa-search"></i></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- home page slider -->
  <div class="homepage-slider">
    @foreach($sliders as $slider)
        <div class="single-homepage-slider" style="background-image: url('{{ asset($slider->Slider_Image) }}'); background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                
                                 <p class="subtitle">{{ session('locale') == 'en' ? $slider->subtitle : $slider->subtitle_ar }}</p>
                                <h3>{{ session('locale') == 'en' ? $slider->Title : $slider->title_ar }}</h3>
                                
                                <div class="hero-btns">
                                    <a href="{{ route('Category.GetAll') }}" class="boxed-btn">@lang('messages.Shop Now')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

    <!-- end home page slider -->









    {{-- {{ trans('string.Home') }} --}}




    @yield('Content');




















    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">@lang('messages.About us')</h2>
                        <p>{{ session('locale') == 'en' ? $setting->AboutUs :$setting->AboutUs_ar }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">@lang('messages.Get in Touch')</h2>
                        <ul>
                            <li>{{ session('locale') == 'en' ? $setting->address :$setting->address_ar }}</li>
                            <li>{{ $setting->email }}</li>
                            <li>{{ $setting->phone }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">@lang('messages.Pages')</h2>
                        <ul>
                            <li><a href="/">@lang('messages.Home')</a></li>
                            <li><a href="{{ route('Prodect.CatId') }}">@lang('messages.Products')</a></li>
                            <li><a href="{{ route('Category.GetAll') }}">@lang('messages.Categories')</a></li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights
                        Reserved.<br>
                        Distributed By - <a href="https://themewagon.com/">Themewagon</a>
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="{{ $setting->facebook_url }}"target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $setting->twitter_url }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $setting->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{ asset('assets/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    
  <!--Important-->
<!-- jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slick JS -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>

</html>
