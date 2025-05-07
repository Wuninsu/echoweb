<div>
    <!-- Start  Page hero-->
    <section class="page-hero hero-swiper-slider slider-fade off-grid-text  d-flex align-items-center" id="page-hero">
        <div class="overlay-photo-image-bg "></div>
        <!--Start  Swiper JS slider-->
        <div class="slider swiper-container">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="slide-bg-img" data-background="{{ asset('storage/' . ($slider->image ?? NO_IMAGE)) }}">
                            <div class="overlay-color"></div>
                        </div>
                        <div class="container">
                            <div class="hero-text-area pt-0">
                                <div class="row">
                                    <div class="col-12 col-lg-10">
                                        @if ($slider->subtitle)
                                            <div class="tag-line">{{ $slider->subtitle }}</div>
                                        @endif
                                        <h1 class="slide-title">
                                            <span class="first-word hollow-text">
                                                {{ $slider->title }}
                                                <span class="title-design-element"></span>
                                            </span>
                                        </h1>
                                    </div>
                                    @if ($slider->description)
                                        <div class="col-9 col-lg-6">
                                            <p class="slide-subtitle">
                                                {{ $slider->description }}
                                            </p>
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <div class="cta-links-area">
                                            @if ($slider->button_text && $slider->button_link)
                                                <a class="btn-solid cta-link cta-link-primary"
                                                    href="{{ $slider->button_link }}">
                                                    {{ $slider->button_text }}
                                                </a>
                                            @endif
                                            <a class="btn-solid cta-link" href="{{ route('contact') }}">Contact us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="slides-state  ">
                <div class="slide-num curent-slide  "></div>
                <!--Add Pagination-->
                <div class="swiper-pagination"></div>
                <div class="slide-num slides-count  "></div>
            </div>
            <!--Add Arrows -->
            <div class="slider-stacked-arrows">
                <div class="swiper-button-prev  wow fadeInRight" data-wow-offset="0" data-wow-delay=".2s">
                    <div class="left-arrow"><i class="fas fa-arrow-left icon "></i>
                    </div>
                </div>
                <div class="swiper-button-next wow fadeInRight" data-wow-offset="0" data-wow-delay=".4s">
                    <div class="right-arrow"><i class="fas fa-arrow-right icon "></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  Page hero-->
    <!-- Start  services Section-->
    <section class="services services-boxed has-shifted-down-stats is-dark mega-section  " id="services">
        <div class="container">
            <div class="section-heading center-heading">
                <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s"><span class='hollow-text'>services</span>
                    we provide<span class="title-design-element "></span></h2>
                <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
            </div>
            <div class="row services-row">
                @foreach ($services as $index => $service)
                    <div class="col-12 col-md-9 col-lg-4 mx-auto">
                        <!-- Start service box -->
                        <div class="service-box wow fadeInUp {{ $index === 0 ? 'featured' : '' }}" data-wow-offset="0"
                            data-wow-delay=".{{ $index + 2 }}s" data-tilt="data-tilt">

                            @if ($service->icon)
                                <div class="service-icon"><i class="{{ $service->icon }} font-icon"></i></div>
                            @endif

                            <span class="service-num hollow-text">{{ $index + 1 }}</span>

                            <div class="service-content">
                                <h3 class="service-title">{{ $service->title }}</h3>
                                <p class="service-text">
                                    {{ \Illuminate\Support\Str::limit($service->description, 120) }}
                                </p>
                            </div>

                            <a class="read-more" href="#0">read more<i class="fas fa-arrow-right icon"></i></a>
                        </div>
                        <!-- End service box -->
                    </div>
                @endforeach
            </div>

        </div>
        <div class="stats stats-counter shifted-down is-dark ">
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
    <!-- End  services Section-->
    <!-- Start  portfolio Section-->
    <section class="portfolio  mega-section   " id="portfolio">
        <div class="container">
            <div class="section-heading center-heading">
                <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s"><span class='hollow-text'>portfolio</span>
                    of our work<span class="title-design-element "></span>
                </h2>
                <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
            </div>
            <div class="portfolio-wrapper  ">
                <!--a menu of links to show the photos users needs   -->
                <ul class="portfolio-btn-list ">
                    <li class="portfolio-btn active " data-filter="*">all</li>
                    <li class="portfolio-btn        " data-filter=".business">business</li>
                    <li class="portfolio-btn        " data-filter=".financial">financial</li>
                    <li class="portfolio-btn        " data-filter=".Corporate">Corporate</li>
                    <li class="portfolio-btn        " data-filter=".residential">residential</li>
                </ul>
                <div class="portfolio-group wow fadeIn" data-wow-delay=".2s">
                    <div class="row  g-0 ">
                        <div class="col-12  col-sm-6  col-lg-4  portfolio-item business ">
                            <div class="item"><a class="portfolio-img-link " href="portfolio-single_dark.html">
                                    <div class="overlay overlay-color"></div><img class="portfolio-img  img-fluid "
                                        src="assets/images/portfolio/1.jpg" alt="portfolio item photo">
                                </a>
                                <div class="item-info "><span class="tag-line">finance</span>
                                    <h3 class="item-title">Add title here</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12  col-sm-6  col-lg-4  portfolio-item financial  ">
                            <div class="item"><a class="portfolio-img-link " href="portfolio-single_dark.html">
                                    <div class="overlay overlay-color"></div><img class="portfolio-img  img-fluid "
                                        src="assets/images/portfolio/2.jpg" alt="portfolio item photo">
                                </a>
                                <div class="item-info "><span class="tag-line">finance</span>
                                    <h3 class="item-title">Add title here</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12  col-sm-6  col-lg-4  portfolio-item Corporate ">
                            <div class="item"><a class="portfolio-img-link " href="portfolio-single_dark.html">
                                    <div class="overlay overlay-color"></div><img class="portfolio-img  img-fluid "
                                        src="assets/images/portfolio/3.jpg" alt="portfolio item photo">
                                </a>
                                <div class="item-info "><span class="tag-line">finance</span>
                                    <h3 class="item-title">Add title here</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12  col-sm-6  col-lg-4  portfolio-item business ">
                            <div class="item"><a class="portfolio-img-link " href="portfolio-single_dark.html">
                                    <div class="overlay overlay-color"></div><img class="portfolio-img  img-fluid "
                                        src="assets/images/portfolio/4.jpg" alt="portfolio item photo">
                                </a>
                                <div class="item-info "><span class="tag-line">finance</span>
                                    <h3 class="item-title">Add title here</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12  col-sm-6  col-lg-4  portfolio-item residential ">
                            <div class="item"><a class="portfolio-img-link " href="portfolio-single_dark.html">
                                    <div class="overlay overlay-color"></div><img class="portfolio-img  img-fluid "
                                        src="assets/images/portfolio/5.jpg" alt="portfolio item photo">
                                </a>
                                <div class="item-info "><span class="tag-line">finance</span>
                                    <h3 class="item-title">Add title here</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12  col-sm-6  col-lg-4  portfolio-item business">
                            <div class="item"><a class="portfolio-img-link " href="portfolio-single_dark.html">
                                    <div class="overlay overlay-color"></div><img class="portfolio-img  img-fluid "
                                        src="assets/images/portfolio/6.jpg" alt="portfolio item photo">
                                </a>
                                <div class="item-info "><span class="tag-line">finance</span>
                                    <h3 class="item-title">Add title here</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Start .see-more-area-->
            <div class=" see-more-area   wow fadeInUp" data-wow-delay="0s"> <a class=" btn-solid "
                    href="portfolio-grid_dark.html">see our portfolio</a></div>
            <!--End .see-more-area-->
        </div>
    </section>
    <!-- End  portfolio Section-->
    <!-- Start  about Section-->
    <section class="about  dark-section mega-section p-0" id="about">
        <div class="container-fluid px-0">
            <!-- Start Second about div-->
            <div class="content-block  wide-section ">
                <div class="row  g-0 ">
                    <div class="col-12 col-lg-6 d-flex align-items-center   about-col wow fadeIn" data-wow-delay="0.4s">
                        <div class="wide-img-area   "><img src="assets/images/about/1.jpg" alt="show case wide image">
                        </div>
                        <div class="video-wrapper on-end">
                            <div class="play-btn-col-dir"><a class="video-link"
                                    href="https://www.youtube.com/watch?v=QI4_dGvZ5yE&amp;ab_channel=JUtah"
                                    role="button" data-fancybox="data-fancybox">
                                    <div class="play-video-btn">
                                        <div class="play-btn"> <i class="fas fa-play icon"></i></div>
                                    </div>
                                </a></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6   d-flex align-items-center  about-col  wow fadeInUp"
                        data-wow-delay="0.2s">
                        <div class="text-area "><span class="tag-line">about Us</span>
                            <div class="section-heading side-heading  light-title">
                                <h2 class="section-title "> trusted by worldwide clients since<span
                                        class='featured-text'> 1975.</span><span class="title-design-element "></span>
                                </h2>
                            </div>
                            <p class=" init-text">
                                Lorem ipsum dolor, sit amet consectetur
                                adipisicing elit.
                                Distinctio,
                                aliquam est!
                                rerum inventore animi at iusto
                                totam sunt accusamus quia

                            </p>
                            <div class="info-items-list ">
                                <div class="row ">
                                    <div class="col-12 col-md-6">
                                        <div class="info-item wow fadeInUp" data-wow-delay=".2s"><i
                                                class="fas fa-chess-rook hollow-text info-icon"></i>
                                            <div class="info-content">
                                                <h5 class="info-title">Planning</h5>
                                                <p class="info-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="info-item wow fadeInUp" data-wow-delay=".4s"><i
                                                class="fas fa-database hollow-text info-icon"></i>
                                            <div class="info-content">
                                                <h5 class="info-title">designing </h5>
                                                <p class="info-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="info-item wow fadeInUp" data-wow-delay=".6s"><i
                                                class="fas fa-chart-line hollow-text info-icon"></i>
                                            <div class="info-content">
                                                <h5 class="info-title">building </h5>
                                                <p class="info-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="info-item wow fadeInUp" data-wow-delay=".8s"><i
                                                class="fas fa-layer-group hollow-text info-icon"></i>
                                            <div class="info-content">
                                                <h5 class="info-title">deliver </h5>
                                                <p class="info-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cta-area wow fadeInUp" data-wow-delay=".8s"><a class=" btn-solid "
                                    href="about-us-1_dark.html">Learn more</a>
                                <div class="signature ">
                                    <div class="signature-img"></div>
                                    <div class="signature-name">CEO &amp; Founder </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Second about div-->
        </div>
    </section>
    <!-- End  about Section-->
    <!-- Start  our-clients Section-->
    <section class="our-clients   elf-section" id="our-clients">
        <div class="container">
            <div class="section-heading d-none ">
                <h4 class="section-title ">our great clients</h4>
                <p class="section-subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, architecto
                    cupiditate odio rerum est</p>
                <div class="line-gradient-color"> </div>
            </div>
            <div class=" clients-logos d-flex align-items-center justify-content-around flex-wrap">
                <!--Swiper-->
                <div class="swiper-container">
                    <div class="swiper-wrapper clients-logo-wrapper wow fadeIn " data-wow-delay=".02s">
                        <!-- every client logo is located inside div  with clss name "swiper-slide ".
              if you want to add more logos please keep the strcture of the swiper-slide as showen below
              
              
              -->
                        <div class="swiper-slide">
                            <div class="client-logo  "><a href="#0"><img class="img-fluid logo "
                                        src="assets/images/clients-logos/1-white.png" alt=" "></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="client-logo "><a href="#0"><img class="img-fluid logo "
                                        src="assets/images/clients-logos/2-white.png" alt=" "></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="client-logo "><a href="#0"><img class="img-fluid logo "
                                        src="assets/images/clients-logos/3-white.png" alt=" "></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="client-logo "><a href="#0"><img class="img-fluid logo "
                                        src="assets/images/clients-logos/4-white.png" alt=" "></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="client-logo "><a href="#0"><img class="img-fluid logo "
                                        src="assets/images/clients-logos/5-white.png" alt=" "></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="client-logo "><a href="#0"><img class="img-fluid logo "
                                        src="assets/images/clients-logos/6-white.png" alt=" "></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="client-logo "><a href="#0"><img class="img-fluid logo "
                                        src="assets/images/clients-logos/7-white.png" alt=" "></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  our-clients Section-->
    <!-- Start  our-team Section-->
    <section class="our-team mega-section " id="our-team">
        <div class="container">
            <div class="section-heading center-heading">
                <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s"> our <span
                        class='hollow-text'>Experts</span> team members<span class="title-design-element "></span>
                </h2>
                <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!--first Team Member-->
                <div class="col-12 col-md-8  col-lg-4 mx-md-auto ">
                    <div class="tm-member-card   wow   fadeInUp" data-wow-delay="0.2s" data-tilt="data-tilt">
                        <div class="tm-image js-tilt"><a class="tm-link" href="team-member_dark.html">
                                <div class="overlay overlay-color"></div><img class="img-fluid "
                                    src="assets/images/our-team/1.jpg" alt="Team Member" />
                            </a>
                            <div class="tm-social">
                                <div class="sc-wrapper dir-row sc-size-40">
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
                        <div class="tm-details"><a class="tm-link" href="team-member_dark.html">
                                <h6 class="tm-name">ahmed Aly</h6>
                            </a><span class="tm-role">Founder </span></div>
                    </div>
                </div>
                <!--Second Team Member-->
                <div class="col-12 col-md-8  col-lg-4 mx-md-auto ">
                    <div class="tm-member-card   wow   fadeInUp" data-wow-delay="0.4s" data-tilt="data-tilt">
                        <div class="tm-image js-tilt"><a class="tm-link" href="team-member_dark.html">
                                <div class="overlay overlay-color"></div><img class="img-fluid "
                                    src="assets/images/our-team/2.jpg" alt="Team Member" />
                            </a>
                            <div class="tm-social">
                                <div class="sc-wrapper dir-row sc-size-40">
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
                        <div class="tm-details"><a class="tm-link" href="team-member_dark.html">
                                <h6 class="tm-name">fairouz amin</h6>
                            </a><span class="tm-role">lawyer </span></div>
                    </div>
                </div>
                <!--Third Team Member-->
                <div class="col-12 col-md-8  col-lg-4 mx-md-auto ">
                    <div class="tm-member-card   wow   fadeInUp" data-wow-delay="0.6s" data-tilt="data-tilt">
                        <div class="tm-image js-tilt"><a class="tm-link" href="team-member_dark.html">
                                <div class="overlay overlay-color"></div><img class="img-fluid "
                                    src="assets/images/our-team/3.jpg" alt="Team Member" />
                            </a>
                            <div class="tm-social">
                                <div class="sc-wrapper dir-row sc-size-40">
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
                        <div class="tm-details"><a class="tm-link" href="team-member_dark.html">
                                <h6 class="tm-name">Allan Smith</h6>
                            </a><span class="tm-role">accountant </span></div>
                    </div>
                </div>
            </div>
        </div>
        <!--Start see-more-area-->
        <div class="see-more-area   wow fadeInUp" data-wow-delay="0.8s"><a class=" btn-solid"
                href="our-team_dark.html">all team members </a></div>
    </section>
    <!-- End  our-team Section-->
    <!-- Start  testimonials Section-->
    <section
        class="testimonials bg-img-section testimonials-1-col off-grid bg-img-section d-flex align-items-center mega-section   "
        id="testimonials-off-grid-1-col">
        <div class="overlay-pattern-image-bg"></div>
        <div class="overlay-photo-image-bg parallax"></div>
        <div class="overlay-color"></div>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-12 col-lg-4 ">
                    <div class="tag-line wow fadeInDown" data-wow-delay="0s">testmonials</div>
                    <div class="section-heading side-heading light-title ">
                        <h2 class="section-title wow fadeInUp" data-wow-delay=".2s">our clients Feedback about their
                            experience with us<span class="title-design-element "></span></h2>
                    </div>
                    <!--Start .see-more-area-->
                    <div class=" see-more-area d-none  d-lg-flex justify-content-start wow fadeInUp "
                        data-wow-delay="0.4s"><a class=" btn-solid " href="testimonials_dark.html">see all
                            testimonials</a></div>
                    <!--End Of .see-more-area               -->
                </div>
                <div class="col-12 col-lg-8">
                    <div class="swiper-container  wow fadeIn  " data-wow-delay="0s">
                        <div class="swiper-wrapper">
                            <!--First Slide-->
                            <div class="swiper-slide">
                                <div class="testmonial-card d-flex align-items-center justify-content-center">
                                    <div class="testimonial-content">
                                        <div class="customer-info "><img class="img-fluid "
                                                src="assets/images/testimonials/1.jpg" alt="First Slide ">
                                            <div class="customer-details">
                                                <p class="customer-name">brad Ally</p>
                                                <p class="customer-role">Lawyer</p>
                                            </div>
                                        </div>
                                        <div class="customer-testimonial"><i class="fas fa-quote-left   icon"></i>
                                            <div class="rating-stars"><i class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon off"></i></div>
                                            <div class="content">
                                                <p class="testimonial-text "> ipsum dolor sit amet consectetur
                                                    adipisicing elit. Quod, id sequi aut qui est ab, corporis quis
                                                    maiores reiciendis explicabo odio tenetur nulla sint vel.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Second Slide-->
                            <div class="swiper-slide">
                                <div class="testmonial-card d-flex align-items-center justify-content-center">
                                    <div class="testimonial-content">
                                        <div class="customer-info "><img class="img-fluid "
                                                src="assets/images/testimonials/2.jpg" alt="First Slide ">
                                            <div class="customer-details">
                                                <p class="customer-name">Yusuf amin</p>
                                                <p class="customer-role">consultant</p>
                                            </div>
                                        </div>
                                        <div class="customer-testimonial"><i class="fas fa-quote-left   icon"></i>
                                            <div class="rating-stars"><i class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon off"></i></div>
                                            <div class="content">
                                                <p class="testimonial-text "> ipsum dolor sit amet consectetur
                                                    adipisicing elit. Quod, id sequi aut qui est ab, corporis quis
                                                    maiores reiciendis explicabo odio tenetur nulla sint vel.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--third Slide-->
                            <div class="swiper-slide">
                                <div class="testmonial-card d-flex align-items-center justify-content-center">
                                    <div class="testimonial-content">
                                        <div class="customer-info "><img class="img-fluid "
                                                src="assets/images/testimonials/3.jpg" alt="First Slide ">
                                            <div class="customer-details">
                                                <p class="customer-name">fairouz mhmd</p>
                                                <p class="customer-role">accountant</p>
                                            </div>
                                        </div>
                                        <div class="customer-testimonial"><i class="fas fa-quote-left   icon"></i>
                                            <div class="rating-stars"><i class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon off"></i></div>
                                            <div class="content">
                                                <p class="testimonial-text "> ipsum dolor sit amet consectetur
                                                    adipisicing elit. Quod, id sequi aut qui est ab, corporis quis
                                                    maiores reiciendis explicabo odio tenetur nulla sint vel.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--navigation buttons-->
                        <div class="swiper-button-prev">
                            <div class="left-arrow"><i class="fas fa-arrow-left icon "></i>
                            </div>
                        </div>
                        <div class="swiper-button-next">
                            <div class="right-arrow"><i class="fas fa-arrow-right icon "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Start .see-more-area-->
            <div class=" see-more-area d-block d-lg-none wow fadeInUp text-center" data-wow-delay="0.4s"><a
                    class=" btn-solid " href="testimonials_dark.html">see all testimonials</a></div>
            <!--End Of .see-more-area           -->
        </div>
    </section>
    <!-- End  testimonials Section-->
    <!-- Start  blog Section-->
    <section class="blog blog-home mega-section  " id="blog">
        <div class="container ">
            <div class="section-heading center-heading">
                <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s">latest <span
                        class='hollow-text'>news</span><span class="title-design-element "></span></h2>
                <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
            </div>
            <div class="row ">
                <div class="col-12 ">
                    <div class="posts-grid ">
                        <div class="row">
                            @foreach ($blogs as $blog)
                                <div class="col-12 col-lg-4">
                                    <div class="post-box border">
                                        <a class="post-link" href="{{ route('posts.show', $blog->slug) }}">
                                            <div class="post-img-wrapper">
                                                <div class="overlay-color"></div>
                                                <i class="fas fa-arrow-right icon"></i>
                                                <img class="post-img"
                                                    src="{{ asset('storage/' . ($blog->image ?? 'NO_IMAGE')) }}"
                                                    alt="{{ $blog->title }}"
                                                    style="height: 250px; object-fit: cover; width: 100%;">

                                            </div>
                                        </a>
                                        <div class="post-summary p-2">
                                            <h4 class="post-date">
                                                <span
                                                    class="day">{{ \Carbon\Carbon::parse($blog->published_at)->format('d') }}</span>
                                                {{ \Carbon\Carbon::parse($blog->published_at)->format('M, Y') }}
                                            </h4>
                                            <div class="post-info">
                                                <a class="info post-author" href="#">
                                                    <i class="fas fa-user icon"></i>
                                                    {{ $blog->author->name ?? 'Anonymous' }}
                                                </a>
                                            </div>
                                            <div class="post-text">
                                                <a class="post-link" href="{{ route('posts.show', $blog->slug) }}">
                                                    <h2 class="post-title">{{ $blog->title }}</h2>
                                                </a>
                                                <p class="post-excerpt">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) }}
                                                </p>
                                                <div class="bg-color text-center">
                                                    <a class="read-more text-white" href="{{ route('posts.show', $blog->slug) }}">read
                                                        more<i class="fas fa-arrow-right icon"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  blog Section-->
    <!-- Start  take-action Section-->
    <section class="subscribe  mega-section " id="subscribe">
        <div class="overlay-photo-image-bg "></div>
        <div class="overlay-color "></div>
        <div class="cta-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 align-self-center">
                        <div class="tag-line wow fadeInDown" data-wow-delay=".2s">Newsletter</div>
                        <div class="section-heading side-heading light-title ">
                            <h2 class="section-title wow fadeInUp" data-wow-delay=".2s">stay always connected<span
                                    class="title-design-element "></span></h2>
                            <p class="section-subtitle wow fadeInUp" data-wow-delay=".6s">subscribe to receive latest
                                news and features about <br> our firm and the markets you interested in.</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mx-auto align-self-center">
                        <div class="form-area wow fadeInUp " data-wow-delay="0.4s">
                            <div class="mailchimp-form ">
                                <div class="mc-form-area " id="mc_embed_signup">
                                    <form class="validate mc-form one-field-form"
                                        action="https://gmail.us7.list-manage.com/subscribe/post?u=7e1ce4a24acd782fd92fbd6f4&amp;amp;id=e0e553155e"
                                        method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                        target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll">
                                            <div class="mc-field-group field-group ">
                                                <label class="d-none" for="mce-EMAIL">Subscribe</label>
                                                <input class="required email email-input " type="email" value=""
                                                    name="EMAIL" id="mce-EMAIL" placeholder="Email Address">
                                                <!--real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                                    <input type="text" name="b_59442f002934450af13bdfe82_f85a400e6a"
                                                        tabindex="-1" value="">
                                                </div>
                                            </div>
                                            <div class="clear cta-area">
                                                <input class="button btn-solid subscribe-btn" type="submit"
                                                    value="Subscribe" name="subscribe" id="mc-embedded-subscribe">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="mailchimp-alerts">
                                        <div class="mc-msg mc-submitting"> </div>
                                        <!-- mailchimp-submitting end -->
                                        <div class="mc-msg mc-success"> </div>
                                        <!-- mailchimp-success end	-->
                                        <div class="mc-msg mc-error"> </div>
                                        <!--mailchimp-error end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>