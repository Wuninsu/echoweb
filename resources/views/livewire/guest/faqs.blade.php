<div>
@include('partials.hero', ['title' => 'faqs'])


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
                <div class="sec-heading">
                    <div class="content-area"><span class=" pre-title       wow fadeInUp " data-wow-delay=".2s">FAQs</span>
                        <h2 class=" title    wow fadeInUp" data-wow-delay=".4s"><span class='hollow-text'>frequently </span>
                            asked questions </h2>
                    </div>
                </div>
                <!--Start Accordion List For FAQ-->
                <div class="faq-accordion " id="accordion">
                    <div class="row">
                        @foreach ($faqs as $index => $faq)
                            <div class="col-12">
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