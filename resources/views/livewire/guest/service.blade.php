<div>
    @include('partials.hero', ['title' => 'Services'])

    <!-- Start  services Section-->
    <section class="services services-boxed mega-section  " id="services">
        <div class="container">
            <div class="sec-heading  ">
                <div class="content-area"><span class=" pre-title       wow fadeInUp "
                        data-wow-delay=".2s">services</span>
                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s"><span class='hollow-text'>services</span> we
                        offer</h2>

                </div>
            </div>
            <div class="row gx-4 gy-4 services-row ">
                @forelse ($services as $index => $service)
                    <div class="col-12 col-md-6  col-lg-4 mx-auto ">
                        <div class="box service-box  wow fadeInUp reveal-start" data-wow-offset="0"
                            data-wow-delay=".{{ $index + 2 }}s">

                            @if ($service->icon)
                                <div class="service-icon"><i class="{{ $service->icon }} font-icon"></i></div>
                            @endif
                            <span class="service-num hollow-text">{{ $index + 1 }}</span>
                            <div class="service-content">
                                <h3 class="service-title">{{ $service->title }}</h3>
                                <p class="service-text">{{ \Illuminate\Support\Str::limit($service->description, 100) }}</p>
                            </div><a class="read-more" href="#">read more<i class="bi bi-arrow-right icon "></i></a>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </section>
    <!-- End  services Section-->

    <!-- Start  faq Section-->
    @php
$faqs = App\Models\Faq::faqData();
    @endphp
    @if ($faqs)
        <section class="faq mega-section" id="faq">
            <div class="shape-top-left"></div>
            <div class="shape-bottom-right"></div>
            <div class="pattern-top-end-dir"></div>
            <div class="pattern-bottom-start-dir"></div>
            <div class="container">
                <div class="sec-heading  centered ">
                    <div class="content-area"><span class=" pre-title       wow fadeInUp " data-wow-delay=".2s">FAQs</span>
                        <h2 class=" title    wow fadeInUp" data-wow-delay=".4s"><span class='hollow-text'>frequently </span>
                            asked questions </h2>
                    </div>
                </div>
                <!--Start Accordion List For FAQ-->
                <div class="faq-accordion " id="accordion">
                    <div class="row">
                        @foreach ($faqs as $index => $faq)
                            <div class="col-12 col-lg-6">
                                <div class="card mb-2">
                                    <div class="card-header " id="heading-{{$index + 1}}">
                                        <h5 class="mb-0 faq-title">
                                            <button class="btn btn-link  faq-btn  collapsed " data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{$index + 1}}" aria-expanded="true"
                                                aria-controls="collapse-{{$index + 1}}">
                                                {{$faq->question}}?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse " id="collapse-{{$index + 1}}"
                                        aria-labelledby="collapse-{{$index + 1}}" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <p class="faq-answer">{{$faq->answer}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endif

</div>