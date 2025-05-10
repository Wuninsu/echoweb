<div>
    @include('partials.hero', ['title' => 'Our Works'])

    <section class="portfolio mega-section   " id="portfolio">
        <div class="container">
            <div class="sec-heading  ">
                <div class="content-area"><span class=" pre-title       wow fadeInUp " data-wow-delay=".2s">works</span>
                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">Our Recent <span
                            class='hollow-text'>Works</span></h2>
                </div>
            </div>
            <div class="portfolio-wrapper  ">
                <!--a menu of links to show the photos users needs   -->
                <ul class="portfolio-btn-list wow fadeInUp" data-wow-delay=".2s">
                    <li class="portfolio-btn active" data-filter="*">All</li>
                    <li class="portfolio-btn" data-filter=".completed">Completed</li>
                    <li class="portfolio-btn" data-filter=".ongoing">On Going</li>
                </ul>
                <div class="portfolio-group wow fadeIn" data-wow-delay=".4s">
                    <div class="row ">
                        @forelse ($projects as $project)
                            <div class="col-12  col-md-6  col-lg-4  portfolio-item {{$project->status}}">
                                <div class="item   "><a class="portfolio-img-link"
                                        href="{{route('works.show', ['project' => $project->slug])}}"><img
                                            class="portfolio-img img-fluid " loading="lazy"
                                            src="{{asset('storage/' . ($project->images->first()?->path ?? NO_IMAGE))}}"
                                            alt="{{$project->slug}}" /></a>
                                    <div class="item-info ">
                                        <h3 class="item-title">{{$project->title}}</h3><i
                                            class="bi bi-arrow-right icon "></i>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>