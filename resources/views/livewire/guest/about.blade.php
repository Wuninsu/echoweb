<div>
    @include('partials.hero', ['title' => 'About Us'])

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
                        </div>
                    </div>
                </div>
            </div>
            <!--End first about div-->
        </div>
    </section>
    <!-- End  about Section-->
    <!-- Start  our-team Section-->
    <section class="our-team mega-section " id="our-team">
        <div class="container">
            <div class="sec-heading  ">
                <div class="content-area"><span class=" pre-title       wow fadeInUp " data-wow-delay=".2s">Team</span>
                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s"> our <span
                            class='hollow-text'>Experts</span> team members</h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @forelse ($teamMembers as $index => $item)
                        <div class="col-12 col-md-8  col-lg-4 mx-md-auto ">
                            <div class="tm-member-card     wow   fadeInUp bg-primary" data-wow-delay="0.{{$index + 2}}s">
                                <div class="tm-image js-tilt "><a class="tm-link  " href="#">
                                        <div class="overlay overlay-color"></div><img class="img-fluid parallax-img  "
                                            loading="lazy" src="{{asset('storage/' . ($item->avatar ?? NO_IMAGE))}}"
                                            alt="Team Member" />
                                    </a>
                                    <div class="tm-social">
                                        <div class="sc-wrapper dir-row sc-size-40">

                                            <ul class="sc-list">
                                                @if (!empty($item->info->facebook_link))
                                                    <li class="sc-item" title="Facebook"><a class="sc-link"
                                                            href="{{ $item->info->facebook_link }}"><i
                                                                class="fab fa-facebook-f sc-icon"></i></a></li>
                                                @endif
                                                @if (!empty($item->info->youtube_link))
                                                    <li class="sc-item" title="YouTube"><a class="sc-link"
                                                            href="{{ $item->info->youtube_link }}"><i
                                                                class="fab fa-youtube sc-icon"></i></a></li>
                                                @endif
                                                @if (!empty($item->info->linkedin_link))
                                                    <li class="sc-item" title="Linkedin"><a class="sc-link"
                                                            href="{{ $item->info->linkedin_link }}"><i
                                                                class="fab fa-linkedin sc-icon"></i></a></li>
                                                @endif
                                                @if (!empty($item->info->x_link))
                                                    <li class="sc-item" title="X"><a class="sc-link"
                                                            href="{{ $item->info->x_link }}"><i
                                                                class="fab fa-x-twitter sc-icon"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tm-details"><a class="tm-link" href="team-member.html">
                                        <h6 class="tm-name">{{$item->name ?? 'Unknown'}}</h6>
                                    </a><span class="tm-role">{{$item->info->position ?? 'Developer'}}</span></div>
                            </div>
                        </div>
                    @empty

                    @endforelse

                </div>
            </div>
        </div>
    </section>
    <!-- End  our-team Section-->
    <!-- Start  testimonials-->
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

                            @forelse ($testimonies as $testimonial)
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
                            @empty
                                <div class="alert alert-info text-center mx-auto" role="alert">
                                    <strong>No testimonials available.</strong>
                                </div>
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
            </div>
        </div>
    </section>
    <!-- End  testimonials-->
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
   
</div>