<div>
    <!-- Start inner Page hero-->
    <section class="d-flex align-items-center page-hero hero-vegas-slider inner-page-hero " id="page-hero">
        <div class="overlay-color"></div>
        <div class="vegas-slider-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 hero-text-area ">
                        <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">Contact Us</h1>
                        <nav aria-label="breadcrumb ">
                            <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('home')}}"><i
                                            class="fas fa-home icon "></i>home</a></li>
                                <li class="breadcrumb-item active">contact us</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End inner Page hero-->
    <!-- Start contact-us -->
    <section class="contact-us  mega-section  pb-0" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5  mx-auto  mb-5 mb-lg-0 wow fadeInUp  " data-wow-delay="0.4s">
                    <div class=" contact-info-panel">
                        <div class="overlay-photo-image-bg "></div>
                        <div class="overlay-color"></div>
                        <div class="info-section ">
                            <div class="info-panel"><i class="fas fa-map-marker-alt icon"></i>
                                <div class="info-content">
                                    <h6 class="info-title">our locations</h6>
                                    <p class="info-text">
                                        {{$setups['address'] ?? 'N/A'}}
                                    </p>
                                </div>
                            </div>
                            <div class="info-panel"><i class="fas fa-mobile-alt icon"></i>
                                <div class="info-content">
                                    <h6 class="info-title">phone numbers</h6>
                                    <p class="info-text">
                                    <div class="d-flex">
                                        <a class="tel link me-2"
                                            href="tel:{{$setups['support_phone'] ?? '0200041225'}}">{{$setups['support_phone'] ?? '0200041225'}}</a>
                                        / <a class="tel link ms-2"
                                            href="tel:{{$setups['phone_2'] ?? '0200041225'}}">{{$setups['phone_2'] ?? '0200041225'}}</a>
                                    </div>
                                    </p>
                                </div>
                            </div>
                            <div class="info-panel"><i class="fas fa-envelope icon"></i>
                                <div class="info-content">
                                    <h6 class="info-title">Emails</h6>
                                    <p class="info-text"> <a class="tel link"
                                            href="mailto:{{$setups['contact_form_email'] ?? 'wuninisu.a@yahoo.com'}}">{{$setups['contact_form_email']
                                            ?? 'wuninisu.a@yahoo.com'}}</a></p>
                                </div>
                            </div>
                            <div class="info-panel"><i class="fas fa-globe-africa icon"></i>
                                <div class="info-content">
                                    <h6 class="info-title">website</h6>
                                    <p class="info-text"> <a class="site link"
                                            href="{{$setups['url'] ?? 'www.echoedgedigitalsolutions.com'}}">
                                            {{$setups['url'] ?? 'www.echoedgedigitalsolutions.com'}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7  mx-auto wow fadeInUp  " data-wow-delay="0.2s">
                    <div class="contact-form-panel">
                        <div class="section-heading side-heading  light-title">
                            <h2 class="section-title wow fadeInUp" data-wow-delay=".2s">Keep in toutch <span
                                    class="title-design-element "></span></h2>
                            <p class="section-subtitle wow fadeInUp" data-wow-delay=".6s">We Will answer your questions
                                as soon as possible</p>
                        </div>
                        <div class="contact-form-area input-boxed">
                            <!--Form To have user messages-->
                            <form wire:submit="sendContactMessage" class="main-form" id="contact-us-form"><span
                                    class="done-msg"></span>
                                <div class="row ">
                                    <div class="col-12 col-lg-6">
                                        <div class="   input-wrapper">
                                            <input class="text-input  @error('name') border-danger is-invalid @enderror"
                                                id="user-name" wire:model="name" type="text" />
                                            <label for="user-name"> Name <span class="req">*</span></label><span
                                                class="b-border"></span><span class="error-msg"></span>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="   input-wrapper">
                                            <input
                                                class="text-input  @error('phone') border-danger is-invalid @enderror"
                                                id="user-phone" wire:model="phone" type="text" />
                                            <label for="user-phone"> Phone <span class="req">*</span></label><span
                                                class="b-border"></span><span class="error-msg"></span>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-12 ">
                                        <div class="   input-wrapper">
                                            <input
                                                class="text-input  @error('email') border-danger is-invalid @enderror"
                                                id="msg-email" wire:model="email" type="text" />
                                            <label for="msg-email"> E-mail <span class="req">*</span></label><span
                                                class="b-border"></span><span class="error-msg"></span>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col-12 ">
                                        <div class="   input-wrapper">
                                            <input
                                                class="text-input  @error('subject') border-danger is-invalid @enderror"
                                                id="msg-subject" wire:model="subject" type="text" />
                                            <label for="msg-subject"> Subject <span class="req">*</span></label><span
                                                class="b-border"></span><span class="error-msg"></span>
                                            @error('subject')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="   input-wrapper">
                                            <textarea
                                                class=" text-input  @error('message') border-danger is-invalid @enderror"
                                                id="msg-text" wire:model="message"></textarea>
                                            <label for="msg-text"> your message <span class="req">*</span></label><span
                                                class="b-border"></span><i></i><span class="error-msg"></span>
                                            @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                    <div class="col-12 submit-wrapper">
                                        <button type="submit" class="btn-solid" wire:loading.attr="disabled">
                                            <span wire:loading.remove>Submit Message</span>
                                            <span wire:loading wire:target="sendContactMessage">
                                                <i class="fa fa-spinner fa-spin"></i>
                                                Submitting Message, please wait....
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map-box pt-5 mt-5">
            <div class="mapouter">
                <div class="gmap_canvas">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125950.07814576643!2d-0.8572797!3d9.426669200000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfd43c903162fdeb%3A0x83f46c1562717cde!2sTamale!5e0!3m2!1sen!2sgh!4v1746615954433!5m2!1sen!2sgh"
                        class="map-iframe" id="gmap_canvas" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- End contact-us -->
</div>