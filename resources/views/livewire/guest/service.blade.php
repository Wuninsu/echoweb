<div>

    <!-- Start inner Page hero-->
    <section class="d-flex align-items-center page-hero hero-vegas-slider inner-page-hero " id="page-hero">
        <div class="overlay-color"></div>
        <div class="vegas-slider-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 hero-text-area ">
                        <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">Services</h1>
                        <nav aria-label="breadcrumb ">
                            <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('home')}}"><i
                                            class="fas fa-home icon "></i>home</a></li>
                                <li class="breadcrumb-item active">services</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End inner Page hero-->
    <!-- Start  Services Section-->
    <section class=" services-bg-img flip-cards has-shifted-down-stats  mega-section text-center " id="services">
        <div class="overlay-photo-image-bg"></div>
        <div class="container">
            <div class="section-heading center-heading">
                <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s">our <span
                        class='hollow-text'>services</span><span class="title-design-element "></span></h2>
                <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
            </div>
        </div>
        <div class="container">
            <div class="row   services-row">
                @forelse ($services as $index => $service)
                    <div class="col-12 col-md-9  col-lg-4 mx-auto service-card">
                        <div class="flip-card flip-x wow fadeInUp " data-wow-offset="0" data-wow-delay=".{{ $index + 2 }}s">
                            <div class="front-face">
                                <div class="front-face-inner">

                                    <div class="icon-wrapper ">
                                        <div class="{{ $service->icon }}   font-icon"></div>
                                    </div>
                                    <div class="title-wrapper ">
                                        <h3 class="title">{{ $service->title }}</h3>
                                    </div>
                                    <div class="desc-wrapper">
                                        <p class="desc">{{ \Illuminate\Support\Str::limit($service->description, 120) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="back-face">
                                <div class="bg-img-wrapper"><img class="bg-img"
                                        src="{{asset('storage/no_image.jpg')}}" alt="bg-img" /></div>
                                <div class="overlay-color"></div>
                                <div class="back-face-inner">
                                    <div class="title-wrapper">
                                        <h3 class="title">{{ $service->title }}</h3>
                                    </div>
                                    <div class="desc-wrapper">
                                        <p class="desc">{{ $service->description }}</p>
                                    </div>
                                    {{-- <div class="btn-wrapper"><a class="btn-solid  " href="#0">read more<i
                                                class="fas fa-arrow-right icon ">
                                            </i></a></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse

            </div>
        </div>
        <div class="stats stats-counter shifted-down ">
            <div class="container">
                <div class="stats-inner">
                    <div class="overlay-photo-image-bg"> </div>
                    <div class="overlay-color"></div>
                    <div class="row  g-0 ">
                        <!--Info One-->
                        <div class="col-6 col-lg-3 stat-box ">
                            <div class="stat-box-inner  "><i class="fas fa-cogs stat-icon"></i>
                                <p class="stat-num "><span class="counter" data-from="10" data-to="750"
                                        data-speed="3000" data-refresh-interval="50"></span><span class="sign">+</span>
                                </p>
                                <h5 class="stat-desc">finished projects</h5>
                            </div>
                        </div>
                        <!--Info Two-->
                        <div class="col-6 col-lg-3 stat-box ">
                            <div class="stat-box-inner "><i class="fas fa-business-time stat-icon"></i>
                                <p class="stat-num "><span class="counter" data-from="0" data-to="23" data-speed="3000"
                                        data-refresh-interval="50"></span><span class="sign">K</span></p>
                                <h5 class="stat-desc">Created jobs</h5>
                            </div>
                        </div>
                        <!--Info Three-->
                        <div class="col-6 col-lg-3 stat-box ">
                            <div class="stat-box-inner "><i class="fas fa-users stat-icon"></i>
                                <p class="stat-num "><span class="counter" data-from="0" data-to="200" data-speed="3000"
                                        data-refresh-interval="50"></span><span class="sign">+</span></p>
                                <h5 class="stat-desc">happy customers</h5>
                            </div>
                        </div>
                        <!--Info Four-->
                        <div class="col-6 col-lg-3 stat-box ">
                            <div class="stat-box-inner "><i class="fas fa-layer-group stat-icon"></i>
                                <p class="stat-num "><span class="counter" data-from="0" data-to="28" data-speed="3000"
                                        data-refresh-interval="50"></span><span class="sign">
                                    </span> </p>
                                <h5 class="stat-desc">years Of exprience</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  Services Section-->
    <!-- Start  portfolio-slider Section-->
    <section class="portfolio portfolio-slider    mega-section" id="portfolio">
        <div class="container">
            <div class="section-heading center-heading">
                <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s">Awesome <span
                        class='hollow-text'>portfolio</span><span class="title-design-element "></span></h2>
                <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
            </div>
        </div>
        <!--Swiper-->
        <div class="swiper-container wow fadeIn" data-wow-delay=".5s">
            <div class="swiper-wrapper ">
                <div class="swiper-slide">
                    <div class="item "><a class="portfolio-img-link " href="portfolio-single_dark.html">
                            <div class="overlay overlay-color"></div><img class="  portfolio-img img-fluid  "
                                src="assets/images/portfolio/1.jpg" alt=" ">
                        </a>
                        <div class="item-info "><span class="tag-line">Business</span>
                            <h3 class="item-title">Add title here</h3>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="item"><a class="portfolio-img-link " href="portfolio-single_dark.html">
                            <div class="overlay overlay-color"></div><img class=" portfolio-img img-fluid  "
                                src="assets/images/portfolio/2.jpg" alt=" ">
                        </a>
                        <div class="item-info "><span class="tag-line">finance</span>
                            <h3 class="item-title">Add title here</h3>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="item"><a class="portfolio-img-link " href="portfolio-single_dark.html">
                            <div class="overlay overlay-color"></div><img class=" portfolio-img img-fluid  "
                                src="assets/images/portfolio/3.jpg" alt=" ">
                        </a>
                        <div class="item-info "><span class="tag-line">law studies</span>
                            <h3 class="item-title">Add title here</h3>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="item"><a class="portfolio-img-link " href="portfolio-single_dark.html">
                            <div class="overlay overlay-color"></div><img class=" portfolio-img img-fluid  "
                                src="assets/images/portfolio/4.jpg" alt=" ">
                        </a>
                        <div class="item-info "><span class="tag-line">residential</span>
                            <h3 class="item-title">Add title here</h3>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="item"><a class="portfolio-img-link " href="portfolio-single_dark.html">
                            <div class="overlay overlay-color"></div><img class=" portfolio-img img-fluid  "
                                src="assets/images/portfolio/5.jpg" alt=" ">
                        </a>
                        <div class="item-info "><span class="tag-line">residential</span>
                            <h3 class="item-title">Add title here</h3>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="item"><a class="portfolio-img-link " href="portfolio-single_dark.html">
                            <div class="overlay overlay-color"></div><img class=" portfolio-img img-fluid  "
                                src="assets/images/portfolio/6.jpg" alt=" ">
                        </a>
                        <div class="item-info "><span class="tag-line">family</span>
                            <h3 class="item-title">Add title here </h3>
                        </div>
                    </div>
                    <!--navigation buttons-->
                </div>
            </div>
            <div class="swiper-button-prev">
                <div class="left-arrow"><i class="fas fa-arrow-left icon "></i>
                </div>
            </div>
            <div class="swiper-button-next">
                <div class="right-arrow"><i class="fas fa-arrow-right icon "></i>
                </div>
            </div>
        </div>
    </section>
    <!-- End  portfolio-slider Section-->
    <!-- Start  our-team Section-->
    <section class="benefits  " id="benefits">
        <div class="container"></div>
        <div class="row  g-0 ">
            <div class="col-12  col-lg-6 ">
                <div class="benefits-image-area wow fadeIn" data-wow-delay="0.3s">
                    <div class="overlay overlay-color"></div><img src="assets/images/benefits/benefits-1.jpg"
                        alt="benefit image">
                    <div class="video-wrapper">
                        <div class="play-btn-col-dir"><a class="video-link"
                                href="https://www.youtube.com/watch?v=QI4_dGvZ5yE&amp;ab_channel=JUtah" role="button"
                                data-fancybox="data-fancybox">
                                <div class="play-video-btn">
                                    <div class="play-btn"> <i class="fas fa-play icon"></i></div>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="benefits-boxes-area  wow fadeIn" data-wow-delay="0.6s">
                    <div class="row  g-0 ">
                        <div class="col-12 col-sm-6 benefit-box "><i class="fas fa-bullhorn benefit-icon "></i>
                            <h3 class="benefit-title">business boost</h3>
                            <p class="benefit-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo
                                dolorum sit aliquam</p><a class="read-more" href="#0">read more<i
                                    class="fas fa-arrow-right icon "> </i></a>
                        </div>
                        <div class="col-12 col-sm-6 benefit-box "><i class="fas fa-anchor benefit-icon "></i>
                            <h3 class="benefit-title">value guarantee</h3>
                            <p class="benefit-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo
                                dolorum sit aliquam</p><a class="read-more" href="#0">read more<i
                                    class="fas fa-arrow-right icon "> </i></a>
                        </div>
                        <div class="col-12 col-sm-6 benefit-box "><i class="fas fa-chess benefit-icon "></i>
                            <h3 class="benefit-title">solid plans</h3>
                            <p class="benefit-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo
                                dolorum sit aliquam</p><a class="read-more" href="#0">read more<i
                                    class="fas fa-arrow-right icon "> </i></a>
                        </div>
                        <div class="col-12 col-sm-6 benefit-box"><i class="fas fa-desktop benefit-icon "></i>
                            <h3 class="benefit-title">get more attention</h3>
                            <p class="benefit-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo
                                dolorum sit aliquam</p><a class="read-more" href="#0">read more<i
                                    class="fas fa-arrow-right icon "> </i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  our-team Section-->
    <!-- Start  take-action Section-->
    <section class="take-action mega-section " id="take-action">
        <div class="overlay-photo-image-bg parallax "></div>
        <div class="overlay-color "></div>
        <div class="cta-wrapper">
            <div class="container">
                <div class="section-heading center-heading">
                    <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s">Still Have More <span
                            class='hollow-text'>Questions</span>?<span class="title-design-element "></span></h2>
                    <p class="section-subtitle wow fadeInUp" data-wow-delay=".6s">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Sunt, architecto cupiditate odio rerum est</p>
                    <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
                </div>
                <!--Start .see-more-area-->
                <div class=" see-more-area wow fadeInUp" data-wow-delay="0.8s"><a class=" btn-solid cta-link"
                        href="contact-us_dark.html">get in toutch</a></div>
                <!--End Of .see-more-area        -->
            </div>
        </div>
    </section>
    <!-- End  take-action Section-->
</div>