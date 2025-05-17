<!DOCTYPE html>
<html lang="en">
@php
$setups = App\Models\Setup::setupData();
@endphp

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2XW3YCN95H"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-2XW3YCN95H');
    </script>

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5JNVV38T');</script>
    <!-- End Google Tag Manager -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="5">
    <x-seo::meta />
    <!-- fav icon -->
    <link rel="icon" href="{{asset('storage/' . ($setups['favicon'] ?? NO_IMAGE))}}">

    <!-- bootstarp -->
    <link rel="stylesheet" href="{{asset('assets/css/vendors/bootstrap.min.css')}}">

    <!-- animate.css file -->
    <link rel="stylesheet" href="{{asset('assets/css/vendors/animate.css')}}">

    <!-- Swiper -->
    <link rel="stylesheet" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">

    <!-- flaticon -->
    <link rel="stylesheet" href="{{asset('assets/css/vendors/flaticon/flaticon.css')}}">

    <!-- fontAwesome -->
    <link rel="stylesheet" href="{{asset('assets/css/vendors/all.min.css')}}">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="{{asset('assets/css/vendors/bootstrap-icons-1.9.1/bootstrap-icons.css')}}">

    <!-- Fancybox -->
    <link rel="stylesheet" href="{{asset('assets/css/vendors/jquery.fancybox.min.css')}}">

    <!-- fonts site preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <!-- fonts site preconnect -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <!-- Font Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&amp;display=swap">

    <!-- main-LTR -->
    <link rel="stylesheet" href="{{asset('assets/css/main-LTR.css')}}">
</head>

<body class=" dark-theme ">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JNVV38T" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!--Start Page Header-->
    <header class=" page-header   content-always-light header-basic" id="page-header">
        <div class="header-search-box">
            <div class="close-search"></div>
            <form class="nav-search search-form" role="search" method="get" action="https://www.google.com/search"
                target="_blank">
                <div class="search-wrapper">
                    <label class="search-lbl">Search for:</label>
                    <input class="search-input" type="search" placeholder="Search..." name="q" autofocus="autofocus" />
                    <input type="hidden" name="sitesearch" value="echoedgedigitalsolutions.com" />
                    <button class="search-btn" type="submit"><i class="bi bi-search icon"></i></button>
                </div>
            </form>

        </div>
        <div class="container">
            <nav class="menu-navbar">
                <div class="header-logo"><a class="logo-link" href="#"><img class="logo-img light-logo" loading="lazy"
                            src="{{asset('storage/' . ($setups['logo'] ?? NO_IMAGE))}}" alt="logo" /><img
                            class="logo-img  dark-logo" loading="lazy"
                            src="{{asset('storage/' . ($setups['logo'] ?? NO_IMAGE))}}" alt="logo" /></a></div>
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
                            <a class="menu-link {{ request()->routeIs('service') ? 'active' : '' }}"
                                href="{{ route('service') }}">Services</a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link {{ request()->routeIs('works') || request()->routeIs('works.*') ? 'active' : '' }}"
                                href="{{ route('works') }}">
                                Our Works
                            </a>
                        </li>

                        @php use Illuminate\Support\Str; @endphp

                        <li class="menu-item">
                            <a class="menu-link {{ Str::contains(request()->path(), 'blog') ? 'active' : '' }}"
                                href="{{ route('blog') }}">Blog</a>
                        </li>

                        <li class="menu-item">
                            <a class="menu-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                                href="{{ route('contact') }}">Contact
                                Us</a>
                        </li>
                    </ul>
                </div>
                <div class="controls-box">
                    <!--Menu Toggler button-->
                    <div class="control  menu-toggler"><span></span><span></span><span></span></div>
                    <!--search Icon button-->
                    <div class="control header-search-btn"><i class="bi bi-search icon"></i></div>
                    <!--Dark/Light mode button-->
                    <div class="mode-switcher ">
                        <div class="switch-inner go-light " title="Switch To Light Mode "><i
                                class="bi bi-sun icon "></i></div>
                        <div class="switch-inner go-dark" title="Switch To Dark Mode "><i class="bi bi-moon icon "></i>
                        </div>
                    </div>
                    <!--mini shoping cart-->
                </div>
            </nav>
        </div>
    </header>
    <!--End Page Header-->

    <main>
        {{$slot}}
    </main>


    <section class="take-action elf-section has-dark-bg" id="take-action">
        <div class="overlay-photo-image-bg  "
            data-bg-img="{{asset('storage/' . ($setups['main_background_image'] ?? NO_IMAGE))}}" data-bg-opacity=".25"
            style="background-image: url('{{asset('storage/' . ($setups['main_background_image'] ?? NO_IMAGE))}}');opacity:1;">
        </div>
        <div class="cta-wrapper">
            <div class="container">
                <div class="sec-heading  centered mb-0 ">
                    <div class="content-area"><span class=" pre-title       wow fadeInUp " data-wow-delay=".2s">contact
                            us</span>
                        <h2 class="title wow fadeInUp" data-wow-delay=".4s">Get in Touch with Us</h2>
                        <p class="subtitle wow fadeInUp" data-wow-delay=".6s">
                            Have questions or need help with a project? Our team is here to assist you. <br>
                            Reach out today and let’s build something great together.
                        </p>

                    </div>
                </div>
                <!--Start .see-more-area-->
                <div class=" see-more-area wow fadeInUp" data-wow-delay="0.8s"><a class=" btn-solid cta-link"
                        href="{{route('contact')}}">contact us</a></div>
                <!--End Of .see-more-area        -->
            </div>
        </div>
    </section>

    <!-- Start  page-footer Section-->
    <footer class="page-footer dark-color-footer" id="page-footer">
        <div class="overlay-photo-image-bg"
            data-bg-img="{{asset('storage/' . ($setups['footer_background_image'] ?? NO_IMAGE))}}" data-bg-opacity=".25"
            style="background-image: url('{{asset('storage/' . ($setups['footer_background_image'] ?? NO_IMAGE))}}');opacity:.3">
        </div>
        <div class="container">
            <div class="row footer-cols">
                <div class="col-12 col-md-8 col-lg-4  footer-col "><img class="img-fluid footer-logo" loading="lazy"
                        src="{{asset('storage/' . ($setups['logo'] ?? NO_IMAGE))}}" alt="logo" />
                    <div class="footer-col-content-wrapper">
                        <p class="footer-text-about-us ">

                            {{$setups['footer_text'] ?? ''}}
                        </p>
                    </div>
                    <div class="form-area ">
                        @livewire('guest.subscribe-form')
                    </div>
                </div>
                <div class="col-6 col-lg-2  footer-col ">
                    <h2 class=" footer-col-title    ">useful links</h2>
                    <div class="footer-col-content-wrapper">
                        <ul class="footer-menu ">
                            <li class="footer-menu-item"><i class="bi bi-arrow-right icon "></i><a
                                    class="footer-menu-link" href="{{route('faqs')}}">FAQs</a>
                            </li>
                            <li class="footer-menu-item"><i class="bi bi-arrow-right icon "></i>
                                <a class="footer-menu-link" href="#0" data-bs-toggle="modal"
                                    data-bs-target="#privacyPolicyModal">Privacy
                                    Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-lg-2 footer-col ">
                    <h2 class=" footer-col-title    ">Resources</h2>
                    <div class="footer-col-content-wrapper">
                        <ul class="footer-menu">
                            <li class="footer-menu-item"><i class="bi bi-arrow-right icon "></i><a
                                    class="footer-menu-link" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="footer-menu-item"><i class="bi bi-arrow-right icon "></i><a
                                    class="footer-menu-link" href="{{route('about')}}">About Us</a>
                            </li>
                            <li class="footer-menu-item"><i class="bi bi-arrow-right icon "></i><a
                                    class="footer-menu-link" href="{{route('contact')}}">Contact Us</a>
                            </li>
                            <li class="footer-menu-item"><i class="bi bi-arrow-right icon "></i><a
                                    class="footer-menu-link" href="{{route('service')}}">Services</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12     col-lg-4 footer-col ">
                    <h2 class=" footer-col-title    ">contact information</h2>
                    <div class="footer-col-content-wrapper">
                        <div class="contact-info-card"><i class="bi bi-envelope icon"></i><a
                                class="text-lowercase  info"
                                href="mailto:{{$setups['support_email'] ?? ''}}">{{$setups['support_email'] ?? ''}}</a>
                        </div>
                        <div class="contact-info-card"><i class="bi bi-geo-alt icon"></i><span
                                class="text-lowercase  info">{{$setups['address'] ?? ''}}</span></div>
                        <div class="contact-info-card"><i class="bi bi-phone icon"></i><a class="info"
                                href="tel:{{$setups['support_phone'] ?? ''}}">{{$setups['support_phone'] ?? ''}} </a>
                        </div>
                        <div class="contact-info-card">
                            <div class="social-icons">
                                <div class="sc-wrapper dir-row sc-size-32">
                                    <ul class="sc-list">
                                        <li class="sc-item " title="Facebook"><a class="sc-link"
                                                href="{{$setups['facebook_link'] ?? ''}}" title="social media icon"><i
                                                    class="fab fa-facebook-f sc-icon"></i></a>
                                        </li>
                                        <li class="sc-item " title="youtube"><a class="sc-link"
                                                href="{{$setups['youtube_link'] ?? ''}}" title="social media icon"><i
                                                    class="fab fa-youtube sc-icon"></i></a>
                                        </li>
                                        <li class="sc-item " title="instagram"><a class="sc-link"
                                                href="{{$setups['instagram_link'] ?? ''}}" title="social media icon"><i
                                                    class="fab fa-instagram sc-icon"></i></a>
                                        </li>
                                        <li class="sc-item " title="X"><a class="sc-link"
                                                href="{{$setups['x_link'] ?? ''}}" title="social media icon"><i
                                                    class="fab fa-x-twitter sc-icon"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <p class="creadits">

                            {{$setups['copy_right_text'] ?? ''}}

                            <a class="link" href="{{$setups['url']}}">{{'Visit Us'}}</a>
                        </p>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end">
                        <div class="terms-links"><a href="{{route('faqs')}}">FAQs </a>
                            | <a href="#0" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal">Privacy
                                Policy.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End  page-footer Section-->
    <!-- Start loading-screen Component-->
    <div class="loading-screen" id="loading-screen"><span class="bar top-bar"></span><span
            class="bar down-bar"></span><span class="progress-line"></span><span class="loading-counter"> </span></div>
    <!-- End loading-screen Component-->
    <!-- Start back-to-top Button-->
    <div class="back-to-top" id="back-to-top"><i class="bi bi-arrow-up icon "></i>
    </div>
    <!-- End back-to-top Button-->
    <!-- Start privacy-policy-modal-->
    <div class="modal privacy-policy-modal fade" id="privacyPolicyModal" aria-labelledby="PrivacyPolicyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl ">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h2 class="modal-title" id="PrivacyPolicyModalLabel">Privacy Policy</h2>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <p><strong>Echo Edge is committed to protecting your privacy. This Privacy Policy explains how
                                we
                                collect, use, disclose, and safeguard your information when you visit our website
                                [echoedgedigitalsolutions.com], use our services,
                                or interact with us.</strong></p>
                    </div>

                    <div class="content">
                        <h4>Information We Collect</h4>
                        <p>We may collect personal identification information (such as your name, email address, and
                            phone number), usage
                            data (such as pages visited, time spent on pages, IP address, and browser type), and cookies
                            or similar tracking
                            technologies to enhance your experience.</p>
                    </div>

                    <div class="content">
                        <h4>How We Use Your Information</h4>
                        <p>We use your information to provide and improve our services, respond to inquiries, send
                            updates and promotional
                            materials (if you opt in), and analyze site usage to enhance functionality.</p>
                    </div>

                    <div class="content">
                        <h4>Sharing Your Information</h4>
                        <p>We do not sell, rent, or trade your personal information. We may share your information with
                            trusted service
                            providers who assist us in operating our website, or with legal authorities when required by
                            law.</p>
                    </div>

                    <div class="content">
                        <h4>Your Data Rights</h4>
                        <p>You have the right to access, correct, or delete your data. You may also withdraw consent or
                            opt out of marketing
                            communications at any time by contacting us at the email provided.</p>
                    </div>

                    <div class="content">
                        <h4>Cookies</h4>
                        <p>We use cookies to personalize your experience and analyze usage. You can disable cookies
                            through your browser
                            settings if you prefer not to share this data.</p>
                    </div>

                    <div class="content">
                        <h4>Data Security</h4>
                        <p>We implement appropriate technical and organizational measures to secure your data against
                            unauthorized access,
                            disclosure, or misuse.</p>
                    </div>

                    <div class="content">
                        <h4>Changes to This Policy</h4>
                        <p>We may update this Privacy Policy occasionally. Changes will be posted on this page with a
                            new effective date. We
                            encourage you to review it regularly.</p>
                    </div>

                    <div class="content">
                        <h4>Contact Us</h4>
                        <p>If you have any questions or concerns about our privacy practices, you can reach us at: <br>
                            <strong>Email:</strong> {{$setups['support_email'] ?? ''}}<br>
                            <strong>Phone:</strong> {{$setups['support_phone'] ?? ''}}<br>
                            <strong>Address:</strong> {{$setups['address'] ?? ''}}
                        </p>
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn-solid" type="button" data-bs-dismiss="modal" aria-label="Close">Click to
                        close</button>
                    <a href="{{route('contact')}}" class="btn-outline" type="button">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End privacy-policy-modal-->

    <!--     JQuery     -->
    <script src="{{asset('assets/js/vendors/jquery-3.6.1.min.js')}}"></script>

    <!--     appear     -->
    <script src="{{asset('assets/js/vendors/appear.min.js')}}"></script>

    <!--     bootstrap     -->
    <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>

    <!--     countTo     -->
    <script src="{{asset('assets/js/vendors/jquery.countTo.js')}}"></script>

    <!--     wow     -->
    <script src="{{asset('assets/js/vendors/wow.min.js')}}"></script>

    <!--     swiper     -->
    <script src="{{asset('assets/js/vendors/swiper-bundle.min.js')}}"></script>

    <!--     particles     -->
    <script src="{{asset('assets/js/vendors/particles.min.js')}}"></script>

    <!--     Vanilla-tilt     -->
    <script src="{{asset('assets/js/vendors/vanilla-tilt.min.js')}}"></script>

    <!--     isotope     -->
    <script src="{{asset('assets/js/vendors/isotope-min.js')}}"></script>

    <!--     fancybox     -->
    <script src="{{asset('assets/js/vendors/jquery.fancybox.min.js')}}"></script>

    <!--     main     -->
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>