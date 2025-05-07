<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <x-seo::meta />

    <!-- fav icon -->
    <link rel="icon" href="assets/images/fav-icon/fav-icon.png">

    <!-- bootstarp -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/bootstrap.min.css') }}">

    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/jquery.fancybox.min.css') }}">

    <!-- animate.css file -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/animate.css') }}">

    <!-- Swiper -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/swiper.min.css') }}">

    <!-- fontAwesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/all.min.css') }}">

    <!-- Font Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@100;300;400;500;700;800;900&amp;family=Nunito:wght@100;300;400;500;600;700;800;900&amp;display=swap">

    <!-- main-LTR -->
    <link rel="stylesheet" href="{{ asset('assets/css/main-LTR.css') }}">

    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=681a284698608700128c9d50&product=image-share-buttons&source=platform"
        async="async"></script>
</head>

<body class="dark-theme   rounded-btns ">
    <!--Start Page Header-->
    <header class=" page-header dark-header menu-on-end  header-basic" id="page-header">
        <div class="header-search-box">
            <div class="close-search"></div>
            <form class="nav-search search-form" role="search" method="get" action="#">
                <div class="search-wrapper">
                    <label class="search-lbl">Search for:</label>
                    <input class="search-input" type="search" placeholder="Search..." name="searchInput"
                        autofocus="autofocus" />
                    <button class="search-btn" type="submit"><i class="fas fa-search icon"></i></button>
                </div>
            </form>
        </div>
        <!--start navbar-->
        <div class="bar-bottom">
            <div class="container">
                <nav class="menu-navbar">
                    <div class="header-logo"><a class="logo-link" href="#"><img class="logo-img light-logo"
                                src="assets/images/logo/logo-light.png" alt="logo" /><img class="logo-img  dark-logo"
                                src="assets/images/logo/logo-dark.png" alt="logo" /></a>
                    </div>
                    <div class="links menu-wrapper ">
                        <ul class="list-js links-list">
                            <li class="menu-item"><a
                                    class="menu-link {{ request()->routeIs('home') || request()->routeIs('home.redirect') ? 'active' : '' }}"
                                    href="{{ route('home') }}">Home </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link {{ request()->routeIs('about') ? 'active' : '' }}"
                                    href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link {{ request()->routeIs('service.*') ? 'active' : '' }}"
                                    href="{{ route('service') }}">Services</a>
                            </li>
                            @php use Illuminate\Support\Str; @endphp

                            <li class="menu-item">
                                <a class="menu-link {{ Str::contains(request()->path(), 'blog') ? 'active' : '' }}"
                                    href="{{ route('blog') }}">Blog</a>
                            </li>

                            <li class="menu-item">
                                <a class="menu-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                                    href="{{ route('contact') }}">Contact Us</a>
                            </li>

                        </ul>
                    </div>
                    <div class="controls-box">
                        <div class="control header-search-btn">
                            <svg class="search-icon" width="60" height="60" viewBox="0 0 60 60">
                                <g transform="translate(-1460 -905)">
                                    <g transform="translate(1460 905)">
                                        <g transform="translate(0 0)">
                                            <path class="search-path"
                                                d="M59.634,56.1,42.2,38.669A23.8,23.8,0,1,0,38.669,42.2L56.1,59.634a1.25,1.25,0,0,0,1.768,0l1.767-1.767A1.25,1.25,0,0,0,59.634,56.1ZM23.75,42.5A18.75,18.75,0,1,1,42.5,23.75,18.771,18.771,0,0,1,23.75,42.5Z"
                                                transform="translate(0 0)"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="control  info-toggler"><span> </span><span> </span><span></span></div>
                        <div class="control  menu-toggler"><span></span><span></span><span></span></div>
                    </div><a class="btn-solid header-cta-btn" href="#">Get started</a>
                </nav>
            </div>
        </div>
        <!--End navbar-->
    </header>
    <!--End Page Header-->

    {{ $slot }}
    <!-- Start  page-footer Section-->
    <footer class="page-footer dark-color-footer" id="page-footer">
        <div class="overlay-photo-image-bg"></div>
        <div class="container">
            <div class="row footer-cols">
                <div class="col-12 col-md-8 col-lg-4  footer-col wow fadeInUp " data-wow-delay="0.3s"><img
                        class="img-fluid footer-logo" src="assets/images/logo/logo-light.png" alt="logo" />
                    <div class="footer-col-content-wrapper">
                        <p class="footer-text-about-us ">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Voluptatibus facere modi possimus dignissimos,
                            aliquam nobis eaque? Voluptatem magnam quisquam rem.

                        </p>
                        <div class="social-icons">
                            <div class="sc-wrapper dir-row sc-size-32">
                                <ul class="sc-list">
                                    <li class="sc-item " title="Facebook"><a class="sc-link" href="#0"><i
                                                class="fab fa-facebook-f sc-icon"></i></a></li>
                                    <li class="sc-item " title="youtube"><a class="sc-link" href="#0"><i
                                                class="fab fa-youtube sc-icon"></i></a></li>
                                    <li class="sc-item " title="instagram"><a class="sc-link" href="#0"><i
                                                class="fab fa-instagram sc-icon"></i></a></li>
                                    <li class="sc-item " title="X"><a class="sc-link" href="#0"><i
                                                class="fab fa-x-twitter sc-icon"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2  footer-col wow fadeInUp " data-wow-delay="0.5s">
                    <h2 class=" footer-col-title    ">useful links</h2>
                    <div class="footer-col-content-wrapper">
                        <ul class="footer-menu ">
                            <li class="footer-menu-item"><i class="fas fa-arrow-right icon "></i><a
                                    class="footer-menu-link" href="#0">Google</a>
                            </li>
                            <li class="footer-menu-item"><i class="fas fa-arrow-right icon "></i><a
                                    class="footer-menu-link" href="#0">Dribbble</a>
                            </li>
                            <li class="footer-menu-item"><i class="fas fa-arrow-right icon "></i><a
                                    class="footer-menu-link" href="#0">linkedIn</a>
                            </li>
                            <li class="footer-menu-item"><i class="fas fa-arrow-right icon "></i><a
                                    class="footer-menu-link" href="#0">Wikipiddia</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2 footer-col wow fadeInUp " data-wow-delay=".7s">
                    <h2 class=" footer-col-title    ">Resources</h2>
                    <div class="footer-col-content-wrapper">
                        <ul class="footer-menu">
                            <li class="footer-menu-item"><i class="fas fa-arrow-right icon "></i><a
                                    class="footer-menu-link" href="#0">support</a>
                            </li>
                            <li class="footer-menu-item"><i class="fas fa-arrow-right icon "></i><a
                                    class="footer-menu-link" href="#0">dashboard</a>
                            </li>
                            <li class="footer-menu-item"><i class="fas fa-arrow-right icon "></i><a
                                    class="footer-menu-link" href="#0">drivers</a>
                            </li>
                            <li class="footer-menu-item"><i class="fas fa-arrow-right icon "></i><a
                                    class="footer-menu-link" href="#0">projects</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-8   col-lg-4 footer-col wow fadeInUp " data-wow-delay=".9s">
                    <h2 class=" footer-col-title    ">contact information</h2>
                    <div class="footer-col-content-wrapper">
                        <div class="contact-info-card"><i class="fas fa-envelope icon"></i><a
                                class="text-lowercase  info" href="mailto:example@support.com">example@support.com</a>
                        </div>
                        <div class="contact-info-card"><i class="fas fa-globe-africa icon"></i><a
                                class="text-lowercase  info" href="#0">www.yoursite.com</a></div>
                        <div class="contact-info-card"><i class="fas fa-map-marker-alt icon"></i><span
                                class="text-lowercase  info">5 Xyz st., Abc, alexandria, egypt.</span></div>
                        <div class="contact-info-card"><i class="fas fa-mobile-alt icon"></i><a class="info"
                                href="tel:+20123456789">+20123456789 </a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="creadits">


                            &copy; 2021
                            Created by:

                            <a class="link" href="https://www.templatemonster.com/store/aminthemes/">aminThemes</a>
                        </p>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="terms-links"><a href="#0">Terms of Use </a>
                            | <a href="#0">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End  page-footer Section-->
    <!-- Start loading-screen Component-->
    <div class="loading-screen" id="loading-screen"><span class="bar top-bar"></span><span
            class="bar down-bar"></span><span class="progress-line"></span><span class="loading-counter"> </span>
    </div>
    <!-- End loading-screen Component-->
    <!-- Start back-to-top Component-->
    <div class="back-to-top" id="back-to-top"><i class="fas fa-arrow-up icon"></i></div>
    <!-- End back-to-top Component-->

    <!--     JQuery     -->
    <script src="{{ asset('assets/js/vendors/jquery-3.4.1.min.js') }}"></script>

    <!--     bootstrap     -->
    <script src="{{ asset('assets/js/vendors/bootstrap.bundle.min.js') }}"></script>

    <!--     fancybox     -->
    <script src="{{ asset('assets/js/vendors/jquery.fancybox.min.js') }}"></script>

    <!--     countTo     -->
    <script src="{{ asset('assets/js/vendors/jquery.countTo.js') }}"></script>

    <!--     wow     -->
    <script src="{{ asset('assets/js/vendors/wow.min.js') }}"></script>

    <!--     swiper     -->
    <script src="{{ asset('assets/js/vendors/swiper.min.js') }}"></script>

    <!--     ajaxchimp     -->
    <script src="{{ asset('assets/js/vendors/jquery.ajaxchimp.min.js') }}"></script>

    <!--     Vanilla-tilt     -->
    <script src="{{ asset('assets/js/vendors/vanilla-tilt.min.js') }}"></script>

    <!--     isotope     -->
    <script src="{{ asset('assets/js/vendors/isotope-min.js') }}"></script>

    <!--     main     -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>