<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Bemet - Butcher & Meat Shop HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('upload/favicon.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
</head>

<body>
    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header class="transparent-header">
        <div class="header-top-wrap">
            <div class="container custom-container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="header-top-left">
                            <ul class="list-wrap">
                                <li class="header-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Nguyen Duy, District 8, Ho Chi Minh city.
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <a
                                        href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="header-top-right">
                            <div class="header-top-menu">
                                <ul class="list-wrap">
                                    @if (auth('cus')->check())
                                        <li><a href="{{ route('account.profile') }}">Hi
                                                {{ auth('cus')->user()->name }}</a></li>
                                        <li><a href="{{ route('account.favorite') }}">Favorites</a></li>
                                        <li><a href="{{ route('account.change_password') }}">Change Password</a></li>
                                        <li><a href="{{ route('order.history') }}">My Order</a></li>
                                        <li><a href="{{ route('account.logout') }}">Log Out</a></li>
                                    @else
                                        <li><a href="{{ route('account.login') }}">Login</a></li>
                                        <li><a href="{{ route('account.register') }}">Register</a></li>
                                    @endif

                                </ul>
                            </div>
                            <div class="header-top-social">
                                <ul class="list-wrap">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="menu-area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="menu-wrap">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <nav class="menu-nav">
                                <div class="logo">
                                    <a href="{{ route('home.index') }}"><img
                                            src="{{ asset('/upload/logo/logo.png') }}" alt="Logo"></a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="{{ Request::is('/') ? 'active' : '' }}">
                                            <a href="{{ route('home.index') }}">Home</a>
                                        </li>
                                        <li class="{{ Request::is('about') ? 'active' : '' }}">
                                            <a href="{{ route('home.about') }}">ABOUT US</a>
                                        </li>
                                        <li
                                            class="{{ Str::contains(Request::url(), '/category') ? 'active' : '' }} menu-item-has-children">
                                            <a href="{{ route('home.allcategory') }}">PRODUCTS</a>
                                            <ul class="sub-menu">
                                                @foreach ($cats_home as $cath)
                                                    <li>
                                                        <a
                                                            href="{{ route('home.category', $cath->id) }}">{{ $cath->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>

                                        <li class="{{ Request::is('contact') ? 'active' : '' }}">
                                            <a href="{{ route('home.contact') }}">CONTACT</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul class="list-wrap">
                                        <li class="header-search">
                                            <a href="#"><i class="flaticon-search"></i></a>
                                        </li>
                                        <li class="header-shop-cart">
                                            @if (auth('cus')->check())
                                                <a href="{{ route('cart.index') }}" title="Carts"><i
                                                        class="flaticon-shopping-basket"></i>
                                                    <span>{{ $carts->sum('quantity') }}</span>
                                                </a>
                                            @else
                                                <a href="{{ route('cart.index') }}" title="Carts"
                                                    onclick="alert('Vui lòng đăng nhập để vào giỏ hàng')">
                                                    <i class="flaticon-shopping-basket"></i>
                                                    <span>{{ $carts->sum('quantity') }}</span>
                                                </a>
                                            @endif
                                        </li>
                                        <li class="header-btn">
                                            <a href="tel:0799999785" class="btn">+84 799 999 785</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <nav class="menu-box">
                                <div class="close-btn"><i class="fas fa-times"></i></div>
                                <div class="nav-logo">
                                    <a href="index-2.html"><img src="{{ asset('upload/logo/logo.png') }}"
                                            alt="Logo"></a>
                                </div>
                                <div class="menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix list-wrap">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>

                                </div>
                                <ul class="navigation">
                                    @if (auth('cus')->check())
                                        <li><a href="{{ route('account.profile') }}" style="font-size: 8">Hi
                                                {{ auth('cus')->user()->name }}</a></li>
                                        <li><a href="{{ route('account.favorite') }} "
                                                style="font-size: 8">Favorites</a></li>
                                        <li><a href="{{ route('account.change_password') }}"
                                                style="font-size: 8">Change Password</a>
                                        </li>
                                        <li><a href="{{ route('order.history') }}" style="font-size: 8">My
                                                Order</a></li>
                                        <li><a href="{{ route('account.logout') }}" style="font-size: 8">Log
                                                Out</a></li>
                                    @else
                                        <li><a href="{{ route('account.login') }}" style="font-size: 8">Login</a>
                                        </li>
                                        <li><a href="{{ route('account.register') }}"
                                                style="font-size: 8">Register</a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->

                    </div>
                </div>
            </div>
        </div>

        <!-- header-search -->
        <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="search-wrap text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="search-form">
                                <form action="#">
                                    <input type="text" placeholder="Enter your keyword...">
                                    <button class="search-btn"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-backdrop"></div>
        <!-- header-search-end -->

    </header>
    <!-- header-area-end -->


    @yield('main')

    <!-- footer-area -->
    <footer>
        <div class="footer-area">
            <div class="footer-logo-area">
                <div class="container">
                    <div class="footer-logo-wrap">
                        <ul class="list-wrap">
                            <li class="order-0 order-lg-2">
                                <div class="footer-logo">
                                    <a href="index-2.html"><img src="{{ asset('upload/logo/logo.png') }}"
                                            style="width: 55%" alt=""></a>
                                </div>
                            </li>
                            <li>
                                <div class="footer-social">
                                    <ul class="list-wrap">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="order-lg-3">
                                <div class="footer-newsletter">
                                    <h4 class="title">Our Newsletter</h4>
                                    <form action="#">
                                        <input type="email" placeholder="Enter your email...">
                                        <button type="submit">subscribe</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget">
                                <h4 class="fw-title">about andspa</h4>
                                <div class="footer-contact">
                                    <ul class="list-wrap">
                                        <li>Nguyen Duy, District 8, Ho Chi Minh city.</li>
                                        <li><a href="tel:0123456789">+84 079 4946 985</a></li>
                                        <li><a
                                                href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer-content">
                                    <h4 class="title">Open Hours</h4>
                                    <p>Sunday to Friday <span>06:00-18:00</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget">
                                <h4 class="fw-title">Important Links</h4>
                                <div class="footer-link">
                                    <ul class="list-wrap">
                                        <li><a href="contact.html">CURATION</a></li>
                                        <li><a href="{{ route('home.about') }}">ABOUT US</a></li>
                                        <li><a href="{{ route('account.profile') }}">MY ACCOUNT</a></li>
                                        <li><a href="contact.html">CONTACT</a></li>
                                        <li><a href="contact.html">SHIPPING & RETURNS</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-4">
                            <div class="footer-widget">
                                <h4 class="fw-title">CATEGORIES</h4>
                                <div class="footer-link">
                                    <ul class="list-wrap">
                                        <li><a href="contact.html">How to Order</a></li>
                                        <li><a href="contact.html">Delivery Info</a></li>
                                        <li><a href="contact.html">FAQs</a></li>
                                        <li><a href="contact.html">Terms</a></li>
                                        <li><a href="contact.html">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="footer-widget">
                                <h4 class="fw-title">instagram</h4>
                                <div class="footer-instagram">
                                    <ul class="list-wrap">

                                        <li><a href="#"><img
                                                    src="{{ asset('/assets/img/images/footer_insta01.jpg') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('/assets/img/images/footer_insta02.jpg') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('/assets/img/images/footer_insta03.jpg') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('/assets/img/images/footer_insta04.jpg') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('/assets/img/images/footer_insta05.jpg') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('/assets/img/images/footer_insta06.jpg') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('/assets/img/images/footer_insta07.jpg') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('/assets/img/images/footer_insta08.jpg') }}"
                                                    alt=""></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-7">
                            <div class="copyright-text">
                                <p>© 2023 By <a href="index-2.html">Bemet</a>, All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="footer-card text-end">
                                <img src="{{ asset('upload/images/card.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->

    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/tween-max.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick-animation.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

    @yield('js')

    @if (Session::has('ok'))
        <script>
            $.toast({
                heading: 'Thông báo',
                text: "{{ Session::get('ok') }}",
                showHideTransition: 'slide',
                icon: 'success',
                position: 'top-center',
            })
        </script>
    @endif

    @if (Session::has('no'))
        <script>
            $.toast({
                heading: 'Information',
                text: "{{ Session::get('no') }}",
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-center',
                hideAfter: 10000
            })
        </script>
    @endif
    {{-- <script>
        const img = document.querySelectorAll(".popup-image")
        // img.addEventListener("click", (e) => {
        //     console.log(e.href, "1234")
        // })
        img.forEach(item => item.addEventListener("click", e => {
            e.href = "javascript:void(0)"
        }))
        // console.log(img, "123")
    </script> --}}
</body>

</html>
