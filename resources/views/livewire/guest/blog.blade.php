<div>
    <!-- Start inner Page hero-->
    <section class="d-flex align-items-center page-hero hero-vegas-slider inner-page-hero " id="page-hero">
        <div class="overlay-color"></div>
        <div class="vegas-slider-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 hero-text-area ">
                        <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">Blog</h1>
                        <nav aria-label="breadcrumb ">
                            <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('home')}}"><i
                                            class="fas fa-home icon "></i>home</a></li>
                                <li class="breadcrumb-item active">blog</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End inner Page hero-->
    <!-- Start _2-col-left-sidebar-->
    <section class="blog blog-home mega-section">
        <div class="container ">
            <div class="row ">
                <div class="col-12 col-lg-8 ">
                    <div class="posts-grid">
                        <div class="row">
                            @foreach ($blogs as $blog)
                                <div class="col-12 col-lg-6">
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
                                                    <a class="read-more text-white"
                                                        href="{{ route('posts.show', $blog->slug) }}">read
                                                        more<i class="fas fa-arrow-right icon"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Posts Pagination -->
                            <div>
                                <div class="col-12">
                                    <nav class="posts-pagination">
                                        <ul class="pagination justify-content-center">
                                            <li class="posts-page-item @if ($blogs->onFirstPage()) disabled @endif">
                                                <a class="posts-page-link " href="{{ $blogs->previousPageUrl() }}"
                                                    title="Previous Post">
                                                    <i class="fas fa-arrow-left icon "></i>
                                                </a>
                                            </li>
                                            @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                                <li class="posts-page-item @if ($blogs->currentPage() == $i) active @endif">
                                                    <a class="posts-page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="posts-page-item @if (!$blogs->hasMorePages()) disabled @endif">
                                                <a class="posts-page-link" href="{{ $blogs->nextPageUrl() }}"
                                                    title="Next Post">
                                                    <i class="fas fa-arrow-right icon "></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar">
                        <!--search box-->
                        <div class="search sidebar-box">
                            <form class="search-form" action="#">
                                <input class="search-input" type="search" name="seach_form"
                                    placeholder="Search Posts...">
                                <button class="search-btn" type="submit"><i class="fas fa-search icon"></i></button>
                            </form>
                        </div>
                        <!--categories box-->
                        <div class="cats sidebar-box">
                            <h6 class="sidebar-box-title"> <i class="fas fa-list-alt icon"></i>Categories:</h6>
                            <ul class="sidebar-list cats-list  ">
                                <li class="cat-item"><a class="cat-link" href="#">architecture</a><span
                                        class="cat-count">17</span></li>
                                <li class="cat-item"><a class="cat-link" href="#">interior </a><span
                                        class="cat-count">25</span></li>
                                <li class="cat-item"><a class="cat-link" href="#">exterior</a><span
                                        class="cat-count">14</span></li>
                                <li class="cat-item"><a class="cat-link" href="#">roofing</a><span
                                        class="cat-count">73</span></li>
                                <li class="cat-item"><a class="cat-link" href="#">designs</a><span
                                        class="cat-count">36</span></li>
                            </ul>
                        </div>
                        <!--Recent posts  -->
                        <div class="recent-posts sidebar-box">
                            <h6 class="sidebar-box-title"> <i class="fas fa-history icon"></i>recent posts: </h6>
                            <ul class="sidebar-list r-posts-list ">
                                <li class="r-post-item"><a class="r-post-link" href="#">
                                        <div class="r-post-img-wrapper"><img class="r-post-img"
                                                src="assets/images/blog/recent-posts/1.jpg" alt="recent post image">
                                        </div>
                                        <div class="content">
                                            <h6 class="r-post-title">this is the article title</h6><span
                                                class="r-post-date">jun, 15 2021 </span>
                                        </div>
                                    </a></li>
                                <li class="r-post-item"><a class="r-post-link" href="#">
                                        <div class="r-post-img-wrapper"><img class="r-post-img"
                                                src="assets/images/blog/recent-posts/2.jpg" alt="recent post image">
                                        </div>
                                        <div class="content">
                                            <h6 class="r-post-title">this is the article title</h6><span
                                                class="r-post-date">may, 10 2021 </span>
                                        </div>
                                    </a></li>
                                <li class="r-post-item"><a class="r-post-link" href="#">
                                        <div class="r-post-img-wrapper"><img class="r-post-img"
                                                src="assets/images/blog/recent-posts/3.jpg" alt="recent post image">
                                        </div>
                                        <div class="content">
                                            <h6 class="r-post-title">this is the article title</h6><span
                                                class="r-post-date">feb, 28 2021 </span>
                                        </div>
                                    </a></li>
                                <li class="r-post-item"><a class="r-post-link" href="#">
                                        <div class="r-post-img-wrapper"><img class="r-post-img"
                                                src="assets/images/blog/recent-posts/4.jpg" alt="recent post image">
                                        </div>
                                        <div class="content">
                                            <h6 class="r-post-title">this is the article title</h6><span
                                                class="r-post-date">jun, 07 2021 </span>
                                        </div>
                                    </a></li>
                            </ul>
                        </div>
                        <div class="tags sidebar-box">
                            <h6 class="sidebar-box-title"> <i class="fas fa-tags icon"></i>tags:</h6>
                            <ul class="sidebar-list tags-list ">
                                <li class="tag-item"><a class="tag-link" href="#">furniture</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">facade</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">painting</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">design</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">developing</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">consulting</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">mega</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">concept</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">features</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">services</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">portfolio</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">testmonials</a></li>
                            </ul>
                        </div>
                        <div class="follow-us sidebar-box">
                            <h6 class="sidebar-box-title"> <i class="fas fa-heart icon"></i>follow us on:</h6>
                            <div class="sc-wrapper dir-row sc-size-32">
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
                </div>
            </div>
        </div>
    </section>
    <!-- End _2-col-left-sidebar-->
</div>