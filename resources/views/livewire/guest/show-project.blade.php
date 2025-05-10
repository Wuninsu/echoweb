<div>
    @php
$setups = App\Models\Setup::setupData();
    @endphp
    <section class="d-flex align-items-center page-hero  inner-page-hero " id="page-hero">
        
            <div class="overlay-photo-image-bg parallax"
                data-bg-img="{{ asset('storage/' . ($setups['main_background_image'] ?? NO_IMAGE)) }}" data-bg-opacity="1"
                style="background-image: url('{{ asset('storage/' . ($setups['main_background_image'] ?? NO_IMAGE)) }}');opacity:1;">
            </div>
        <div class="overlay-color" data-bg-opacity=".75"></div>
        <div class="container">
            <div class="hero-text-area centerd">
                <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">Work Detail</h1>
                <nav aria-label="breadcrumb ">
                    <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="#0"><i
                                    class="bi bi-house icon "></i>home</a></li>
                                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('works')}}">Works</a></li>
                        <li class="breadcrumb-item active">{{$project->title ?? 'Unknown'}}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- End inner Page hero-->
    <!-- Start Project Details Area-->
    <section class="portfolio-single mega-section">
        <div class="container">
            <div class="featured-area">
                <div class="row">
                    <div class="col-12  mx-auto">
                        <div class="project-featured-img"><img class="featured-img " loading="lazy"
                                src="{{asset('storage/' . ($project->images->first()?->path ?? NO_IMAGE))}}"
                                alt="featuerd image"></div>
                    </div>
                </div>
            </div>
            <div class="main-area">
                <div class="row">
                    <div class="col-12 col-lg-9  ">
                        <h5 class="sub-heading ">{{$project->title ?? 'Unknown'}}</h5>
                        <p class="project-text">
                            {{$project->description}}
                        </p>
                        <h5 class="sub-heading ">project Images</h5>

                        <div class="portfolio  portfolio-slider">
                            <!--Swiper-->
                            <div class="swiper-container wow fadeIn" data-wow-delay=".5s">
                                <div class="swiper-wrapper ">
                                    @if ($project->images)
                                        @forelse ($project->images as $index => $img)
                                           
                                            <div class="swiper-slide">
                                                <div class="item   "><a class="portfolio-img-link" href="#"
                                                        data-fancybox=".show-in-fancybox"><img class="portfolio-img   img-fluid " loading="lazy"
                                                            src="{{asset('storage/' . ($img->path ?? NO_IMAGE))}}" alt="portfolio item photo" /></a>
                                                    <div class="item-info ">
                                                        <h3 class="item-title">Image {{$index + 1}}</h3><i class="bi bi-eye icon "></i>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-danger mx-auto">No images found.</p>
                                        @endforelse
                                    @endif
                                   
                                </div>
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
                    <div class="col-12 col-lg-3  ">
                        <div class="info-area">
                            <div class="project-info">
                                <div class="row">
                                    <div class="col-6 col-lg-12">
                                        <div class="info">
                                            <h5 class="title"> client</h5>
                                            <p class="detail">{{$project->client ?? 'Unknown'}}</p><i
                                                class="fas fa-address-card icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-12">
                                        <div class="info">
                                            <h5 class="title">category</h5>
                                            <p class="detail">{{$project->service->title ?? 'Unknown'}}</p><i
                                                class="fas fa-tasks icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-12">
                                        <div class="info">
                                            <h5 class="title">date</h5>
                                            <p class="detail">{{$project->start_date}}</p><i
                                                class="fas fa-calendar-alt icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-12">
                                        <div class="info">
                                            <h5 class="title">share</h5>
                                            <div class="sc-wrapper dir-row sc-size-40">
                                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                                    <a class="a2a_button_facebook"></a>
                                                    <a class="a2a_button_email"></a>
                                                    <a class="a2a_button_whatsapp"></a>
                                                    <a class="a2a_button_x"></a>
                                                </div>
                                                <script defer src="https://static.addtoany.com/menu/page.js"></script>
                                            </div><i class="fas fa-share-alt icon"></i>
                                        </div>
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