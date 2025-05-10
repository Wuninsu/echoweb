<section class="d-flex align-items-center page-hero inner-page-hero" id="page-hero">
    @php
        $setups = App\Models\Setup::setupData();
    @endphp
    <div class="overlay-photo-image-bg parallax"
        data-bg-img="{{ asset('storage/' . ($setups['main_background_image'] ?? NO_IMAGE)) }}" data-bg-opacity="1"
        style="background-image: url('{{ asset('storage/' . ($setups['main_background_image'] ?? NO_IMAGE)) }}');opacity:1;">
    </div>
    <div class="overlay-color" data-bg-opacity=".75"></div>
    <div class="container">
        <div class="hero-text-area centerd">
            <h1 class="hero-title wow fadeInUp" data-wow-delay=".2s">{{ $title ?? 'Unknown' }}</h1>
            <nav aria-label="breadcrumb ">
                <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                    <li class="breadcrumb-item">
                        <a class="breadcrumb-link" href="{{ route('home') }}">
                            <i class="bi bi-house icon"></i>home
                        </a>
                    </li>
                    <li class="breadcrumb-item active">{{ $title ?? 'Page' }}</li>
                </ul>
            </nav>
        </div>
    </div>
</section>