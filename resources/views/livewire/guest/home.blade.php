<div class="">
    <section class="page-hero hero-swiper-slider slide-effect  d-flex align-items-center" id="page-hero">
        <div class="particles-js  bubels" id="particles-js"></div>
        <!--Start  Swiper JS slider-->
        <div class="slider swiper-container">
            <div class="swiper-wrapper ">
                @forelse ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="slide-bg-img" data-bg-img="{{ asset('storage/' . ($slider->image ?? NO_IMAGE)) }}">
                            <div class="overlay-gradient-color "
                                style="background-image:url('{{ asset('storage/' . ($slider->image ?? NO_IMAGE)) }}');background-size: cover; background-position: center center; background-repeat: no-repeat; opacity: .25;">
                            </div>
                        </div>
                        <div class="container">
                            <div class="hero-text-area  content-always-light">
                                <div class="row g-0">
                                    <div class="col-12 col-lg-8 ">
                                        <div class="row ">
                                            <div class="col-12   ">
                                                <div class="hero-social-icons mb-3 ">
                                                    <div class="sc-wrapper dir-row sc-flat">
                                                        <ul class="sc-list">
                                                            <li class="sc-item " title="Facebook"><a class="sc-link"
                                                                    href="#0" title="social media icon"><i
                                                                        class="fab fa-facebook-f sc-icon"></i></a>
                                                            </li>
                                                            <li class="sc-item " title="youtube"><a class="sc-link"
                                                                    href="#0" title="social media icon"><i
                                                                        class="fab fa-youtube sc-icon"></i></a>
                                                            </li>
                                                            <li class="sc-item " title="instagram"><a class="sc-link"
                                                                    href="#0" title="social media icon"><i
                                                                        class="fab fa-instagram sc-icon"></i></a>
                                                            </li>
                                                            <li class="sc-item " title="X"><a class="sc-link" href="#0"
                                                                    title="social media icon"><i
                                                                        class="fab fa-x-twitter sc-icon"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12     ">

                                                @if ($slider->subtitle)
                                                    <div class="pre-title">{{ $slider->subtitle }}</div>
                                                @endif
                                                <h1 class="slide-title  ">{{ $slider->title }}</h1>
                                            </div>
                                            @if ($slider->description)
                                                <div class="col-10">
                                                    <p class="slide-subtitle">
                                                        {{ $slider->description }}
                                                    </p>
                                                </div>
                                            @endif
                                            <div class="col-12   ">
                                                <div class="cta-links-area">
                                                    @if ($slider->button_text && $slider->button_link)
                                                        <a class="btn-solid cta-link cta-link-primary"
                                                            href="{{ $slider->button_link }}">
                                                            {{ $slider->button_text }}
                                                        </a>
                                                    @endif
                                                    <a class="btn-outline cta-link" href="{{ route('contact') }}">Contact
                                                        us</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse

            </div>
            <div class="slides-state h-align  ">
                <div class="slide-num curent-slide  "></div>
                <!--Add Pagination-->
                <div class="swiper-pagination"></div>
                <div class="slide-num slides-count  "></div>
            </div>
            <!--Add Arrows -->
            <div class="slider-stacked-arrows">
                <div class="swiper-button-prev   ">
                    <div class="left-arrow"><i class="bi bi-chevron-left icon "></i>
                    </div>
                </div>
                <div class="swiper-button-next  ">
                    <div class="right-arrow"><i class="bi bi-chevron-right icon "></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start  services Section-->
    <section class="services services-boxed mega-section  " id="services">
        <div class="container">
            <div class="sec-heading  ">
                <div class="content-area"><span class=" pre-title       wow fadeInUp "
                        data-wow-delay=".2s">services</span>
                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s"><span class='hollow-text'>services</span> we
                        offer</h2>
                    <p class="subtitle   wow fadeInUp " data-wow-delay=".6s"></p>
                </div>
                <div class=" cta-area   wow fadeInUp" data-wow-delay=".8s"><a href="{{route('service')}}"
                        class="cta-btn btn-solid    ">see all
                        services <i class="bi bi-arrow-right icon "></i></a></div>
            </div>
            <div class="row gx-4 gy-4 services-row text-center">
                @forelse ($services as $index => $service)
                    <div class="col-12 col-md-6  col-lg-4 mx-auto ">
                        <!--Start First service box-->
                        <div class="box service-box  wow fadeInUp reveal-start" data-wow-offset="0"
                            data-wow-delay=".{{ $index + 2 }}s">

                            @if ($service->icon)
                                <div class="service-icon"><i class="{{ $service->icon }} font-icon"></i></div>
                            @endif
                            <span class="service-num hollow-text">{{ $index + 1 }}</span>
                            <div class="service-content">
                                <h3 class="service-title">{{ $service->title }}</h3>
                                <p class="service-text">{{ \Illuminate\Support\Str::limit($service->description, 50) }}</p>
                            </div><a class="read-more" href="#">read more<i class="bi bi-arrow-right icon "></i></a>
                        </div>
                        <!-- End First service box   -->
                    </div>
                @empty

                @endforelse

            </div>
        </div>
    </section>
    <!-- End  services Section-->
    <!-- Start  about Section-->
    <section class="about mega-section" id="about">
        <div class="container">
            <!-- Start first about div-->
            <div class="content-block  ">
                <div class="row">
                    <div class="col-12 col-lg-6 d-flex align-items-center order-1 order-lg-0 about-col pad-end  wow fadeInUp "
                        data-wow-delay="0.6s">
                        <div class="text-area ">
                            <div class="sec-heading  light-title ">
                                <div class="content-area"><span class=" pre-title       wow fadeInUp "
                                        data-wow-delay=".2s">about Us</span>
                                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s"><span
                                            class='hollow-text'>trusted</span> since<span class='featured-text'> 2023.
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150"
                                                preserveAspectRatio="none">
                                                <path
                                                    d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7">
                                                </path>
                                            </svg></span></h2>
                                </div>
                            </div>
                            <p class=" about-text">{{$settings['about_us_sub'] ?? ''}}</p>
                            <p class=" about-text">{{$settings['about_us'] ?? ''}}</p>
                            <div class="info-items-list ">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="info-item">
                                            <i class="flaticon-target info-icon"></i>
                                            <div class="info-content">
                                                <h5 class="info-title">Mission</h5>
                                                <p class="info-text">{{ $settings['mission_statement'] ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="info-item">
                                            <i class="fas fa-eye info-icon"></i>
                                            <div class="info-content">
                                                <h5 class="info-title">Vision</h5>
                                                <p class="info-text">{{ $settings['vision_statement'] ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="cta-area"><a class=" btn-solid reveal-start" href="{{route('about')}}">Get in
                                    touch</a>
                                {{-- <div class="signature ">
                                    <div class="signature-img"></div>
                                    <div class="signature-name">CEO &amp; Founder </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center order-0 order-lg-1 about-col  wow fadeInUp"
                        data-wow-delay="0.2s">
                        <div class="img-area  " data-tilt>
                            <div class="image   "><img class="about-img img-fluid " loading="lazy"
                                    src="assets/images/about/1.png" alt="Our vision"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End first about div-->
            <!-- Start first about div-->
            <div class="content-block  ">
                <div class="row">
                    <div class="col-12 col-lg-6 d-flex align-items-center about-col  wow fadeInUp"
                        data-wow-delay="0.2s">
                        <div class="img-area  ">
                            <div class="image  " data-tilt><img class="about-img img-fluid " loading="lazy"
                                    src="assets/images/about/2.png" alt="about"></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center about-col pad-start  wow fadeInUp "
                        data-wow-delay="0.6s">
                        <div class="text-area ">
                            <div class="sec-heading  light-title ">
                                <div class="content-area"><span class=" pre-title       wow fadeInUp "
                                        data-wow-delay=".2s">why choose us</span>
                                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">Why us</h2>
                                </div>
                            </div>
                            <p class=" about-text">{{$settings['why_choose_us'] ?? ''}}</p>
                            <div class="info-items-list">
                                <div class="row ">
                                    @if ($settings['why_choose_us_points'])
                                        @php
    $points = $settings['why_choose_us_points'] ?? [];
                                        @endphp

                                        @foreach ($points as $i => $point)
                                            <div class="col-12">
                                                <div class="info-item">
                                                    <span
                                                        class="info-number">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}.</span>
                                                    <div class="info-content">
                                                        <h5 class="info-title">{{ $point['title'] ?? 'Default Title' }}</h5>
                                                        <p class="info-text">
                                                            {{ $point['description'] ?? 'Default description text.' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif


                                </div>
                            </div>
                            <div class="cta-area "><a class=" btn-solid " href="{{route('about')}}">get in toutch</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End first about div-->
        </div>
    </section>
    <!-- End  about Section-->
    <!-- Start  stats Section-->
    <section class="stats js-stats-counter mega-section">
        <div class="overlay-photo-image-bg" data-bg-img="assets/images/sections-bg-images/pattern-bg-3.jpg"
            data-bg-opacity=".2"></div>
        <div class="container">
            <div class="stats-inner">
                <div class="row ">
                    <!--Info One-->
                    <div class="col-12 col-md-6 col-lg-4 stat-box ">
                        <div class="stat-box-inner  " data-tilt="data-tilt"><i
                                class="flaticon-project-management stat-icon"></i>
                            <p class="stat-num "><span class="counter" data-from="10" data-to="10" data-speed="3000"
                                    data-refresh-interval="50"></span><span class="sign">+</span></p><span
                                class="stat-desc">finished projects</span>
                        </div>
                    </div>
                    <!--Info Three-->
                    <div class="col-12 col-md-6 col-lg-4 stat-box ">
                        <div class="stat-box-inner  " data-tilt="data-tilt"><i class="flaticon-user stat-icon"></i>
                            <p class="stat-num "><span class="counter" data-from="0" data-to="14" data-speed="3000"
                                    data-refresh-interval="50"></span><span class="sign">+</span></p><span
                                class="stat-desc">happy customers</span>
                        </div>
                    </div>
                    <!--Info Four-->
                    <div class="col-12 col-md-6 col-lg-4 stat-box ">
                        <div class="stat-box-inner  " data-tilt="data-tilt"><i class="flaticon-aim stat-icon"></i>
                            <p class="stat-num "><span class="counter" data-from="0" data-to="3" data-speed="3000"
                                    data-refresh-interval="50"></span><span class="sign">+</span></p><span
                                class="stat-desc">years Of exprience</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  stats Section-->


    <section class="portfolio portfolio-slider    mega-section" id="portfolio">
        <div class="container">
            <div class="sec-heading  ">
                <div class="content-area"><span class=" pre-title       wow fadeInUp " data-wow-delay=".2s">works</span>
                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">Our Recent <span
                            class='hollow-text'>Works</span></h2>
                </div>
                <div class=" cta-area   wow fadeInUp" data-wow-delay=".8s"><a class="cta-btn btn-solid    "
                        href="{{route('works')}}">see more <i class="bi bi-arrow-right icon "></i></a></div>
            </div>
            <!--Swiper-->
            <div class="swiper-container wow fadeIn" data-wow-delay=".5s">
                <div class="swiper-wrapper ">
                    @forelse ($projects as $project)
                        <div class="swiper-slide">
                            <div class="item   "><a class="portfolio-img-link"
                                    href="{{route('works.show', ['project' => $project->slug])}}"><img
                                        class="portfolio-img   img-fluid " loading="lazy"
                                        src="{{asset('storage/' . ($project->images->first()?->path ?? NO_IMAGE))}}"
                                        alt="image_{{$project->slug}}" /></a>
                                <div class="item-info ">
                                    <h3 class="item-title">{{$project->title}}</h3><i class="bi bi-arrow-right icon "></i>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse

                </div>
                <!--navigation buttons-->
                <div class="swiper-button-prev">
                    <div class="left-arrow"><i class="bi bi-chevron-left icon "></i>
                    </div>
                </div>
                <div class="swiper-button-next">
                    <div class="right-arrow"><i class="bi bi-chevron-right icon "></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start  our-clients Section-->
    {{-- <section class="our-clients  bg-main elf-section" id="our-clients">
        <div class="container-fluid">
            <div class="sec-heading d-none ">
                <h4 class="title ">our great clients</h4>
            </div>
            <div class=" clients-logos ">
                <div class="swiper-container">
                    <div class="swiper-wrapper clients-logo-wrapper wow fadeIn " data-wow-delay=".02s">
                        <div class="swiper-slide">
                            <div class="client-logo  "><a href="#0"><img class="img-fluid logo " loading="lazy"
                                        src="assets/images/clients-logos/1-white.png" alt=" "></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End  our-clients Section-->
    <!-- Start  testimonials Section-->
    <section class="testimonials testimonials-1-col   has-dark-bg  mega-section " id="testimonials-img-bg">
        <div class="overlay-photo-image-bg parallax " data-bg-img="assets/images/sections-bg-images/1.jpg"
            data-bg-opacity=".25"> </div>
        <div class="container">
            <div class="sec-heading  centered ">
                <div class="content-area"><span class=" pre-title       wow fadeInUp "
                        data-wow-delay=".2s">testimonials</span>
                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">our clients Feedback</h2>
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-12 col-md-10  mx-auto">
                    <div class="swiper-container  wow fadeInUp  " data-wow-delay="0.2s">
                        <div class="swiper-wrapper">
                            @foreach ($testimonies as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testmonial-card d-flex align-items-center justify-content-center">
                                        <div class="testimonial-content">
                                            <div class="customer-img">
                                                <img class="img-fluid mb-0" loading="lazy"
                                                    src="{{ asset('storage/' . $testimonial->image) }}"
                                                    alt="{{ $testimonial->name }}">
                                            </div>
                                            <div class="customer-testimonial mb-0">
                                                <div class="content">
                                                    <div class="rating-stars">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $testimonial->rating)
                                                                <i class="fas fa-star star-icon"></i>
                                                            @else
                                                                <i class="fas fa-star star-icon off"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <p class="testimonial-text">
                                                        {{ $testimonial->message }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="customer-info mt-0">
                                                <div class="customer-details mt-0">
                                                    <p class="customer-name">{{ $testimonial->name }}</p>
                                                    <p class="customer-role">{{ $testimonial->position }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!--navigation buttons-->
                        <div class="swiper-button-prev">
                            <div class="left-arrow"><i class="bi bi-chevron-left icon "></i>
                            </div>
                        </div>
                        <div class="swiper-button-next">
                            <div class="right-arrow"><i class="bi bi-chevron-right icon "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  testimonials Section-->
    <!-- Start  blog Section-->
    <section class="blog blog-home mega-section  " id="blog">
        <div class="container ">
            <div class="sec-heading  ">
                <div class="content-area"><span class=" pre-title       wow fadeInUp " data-wow-delay=".2s">blog</span>
                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">latest <span class='hollow-text'>news</span>
                    </h2>
                </div>
                <div class=" cta-area  cta-area  wow fadeInUp" data-wow-delay=".8s"><a
                        class="cta-btn btn-solid   cta-btn btn-solid  " href="{{route('blog')}}">see all posts<i
                            class="bi bi-arrow-right icon "></i></a></div>
            </div>
            <div class="row ">
                <div class="col-12 ">
                    <div class="posts-grid ">
                        <div class="row">
                            @forelse ($blogs as $blog)
                                <div class="col-12 col-lg-4 ">
                                    <div class="post-box"> <a class="post-link" href="post-single.html"
                                            title="How litespeed technology works to speed up your site ">
                                            <div class="post-img-wrapper  "><img class=" parallax-img   post-img"
                                                    loading="lazy"
                                                    src="{{ asset('storage/' . ($blog->image ?? 'NO_IMAGE')) }}"
                                                    alt="{{ $blog->title }}"
                                                    style="height: 250px; object-fit: cover; width: 100%;" /><span
                                                    class="post-date"><span class="day">
                                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('d') }}
                                                    </span>{{ \Carbon\Carbon::parse($blog->published_at)->format('M, Y') }}</span>
                                            </div>
                                        </a>
                                        <div class="post-summary">
                                            <div class="post-info"><a class="info post-cat" href="#"> <i
                                                        class="bi bi-bookmark icon"></i>hosting</a><a
                                                    class="info post-author" href="#"> <i
                                                        class=" bi bi-person icon"></i>{{ $blog->author->name ?? 'Anonymous' }}</a>
                                            </div>
                                            <div class="post-text">
                                                <a class="post-link" href="{{ route('posts.show', $blog->slug) }}">
                                                    <h2 class="post-title">{{ $blog->title }}</h2>
                                                </a>

                                                <p class="post-excerpt">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) }}
                                                </p>
                                                <a class="read-more" href="{{ route('posts.show', $blog->slug) }}"
                                                    title="How litespeed technology works to speed up your site ">read
                                                    more<i class="bi bi-arrow-right icon "></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty

                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  blog Section-->
</div>