<div>
    @include('partials.hero', ['title' => 'blog'])

    <!-- End inner Page hero-->
    <!-- Start blog-1-col-posts-->
    <section class="blog blog-home mega-section">
        <div class="container ">
            <div class="row ">
                <div class="col-12 col-xl-8 ">
                    <div class="posts-grid horizontal">
                        <div class="row">
                            @forelse ($blogs as $blog)
                                <div class="col-12 ">
                                    <div class="post-box">
                                        <a class="post-link" href="{{ route('posts.show', $blog->slug) }}"
                                            title="{{$blog->title}}">
                                            <div class="post-img-wrapper">
                                                <img class="parallax-img   post-img" loading="lazy"
                                                    src="{{ asset('storage/' . ($blog->image ?? 'NO_IMAGE')) }}"
                                                    alt="{{$blog->slug}}"
                                                    style="height: 250px; object-fit: cover; width: 300px;" />
                                                <span class="post-date">
                                                    <span class="day">
                                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('d')}}
                                                    </span>
                                                    {{ \Carbon\Carbon::parse($blog->published_at)->format('M, Y') }}
                                                </span>
                                            </div>
                                        </a>

                                        <div class="post-summary">
                                            <div class="post-info"><a class="info post-cat" href="#"> <i
                                                        class="bi bi-bookmark icon"></i>{{__('Unknown')}}</a><a
                                                    class="info post-author" href="#"> <i
                                                        class=" bi bi-person icon"></i>{{ $blog->author->name ?? 'Anonymous' }}</a>
                                            </div>
                                            <div class="post-text"><a class="post-link"
                                                    href="{{ route('posts.show', $blog->slug) }}">
                                                    <h2 class="post-title">
                                                        {{ $blog->title }}
                                                    </h2>
                                                </a>
                                                <p class="post-excerpt">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) }}
                                                </p>
                                                <a class="read-more" href="{{ route('posts.show', $blog->slug) }}"
                                                    title="{{$blog->title}}">read
                                                    more<i class="bi bi-arrow-right icon "></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-info text-center" role="alert">
                                    <strong>No posts available.</strong> check back later!
                                </div>
                            @endforelse
                            <div class="col-12">
                                <!--Start pagination-->
                                <nav class="ma-pagination">
                                    <ul class="pagination justify-content-center">
                                        <li class="ma-page-item  @if ($blogs->onFirstPage()) deactive-page-item @endif">
                                            <a class="ma-page-link " href="{{ $blogs->previousPageUrl() }}"
                                                title="Previous Page">
                                                <i class="bi bi-chevron-left icon "></i>
                                            </a>
                                        </li>

                                        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                            <li class="ma-page-item @if ($blogs->currentPage() == $i) active @endif">
                                                <a class="ma-page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li
                                            class="ma-page-item @if (!$blogs->hasMorePages()) deactive-page-item @endif">
                                            <a class="ma-page-link" href="{{ $blogs->nextPageUrl() }}"
                                                title="Next Page">
                                                <i class="bi bi-chevron-right icon "></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4 ">
                    <div class="blog-sidebar">
                        <!--search box-->
                        <div class="search sidebar-box">
                        <form wire:submit.prevent="applySearch" class="search-form">
                            <input class="search-input" type="search" wire:model.defer="search" placeholder="Search Posts...">
                            <button class="search-btn" type="submit"><i class="bi bi-search icon"></i></button>
                        </form>
                        </div>
                        <!--categories box-->
                        {{-- <div class="cats sidebar-box">
                            <h6 class="sidebar-box-title">
                                Categories:</h6>
                            <ul class="sidebar-list cats-list  ">
                                <li class="cat-item"><a class="cat-link" href="#">data<span
                                            class="cat-count">17</span></a>
                                </li>

                            </ul>
                        </div> --}}
                        <!--Recent posts  -->
                        <div class="recent-posts sidebar-box">
                            <h6 class="sidebar-box-title">
                                recent posts: </h6>
                            <ul class="sidebar-list r-posts-list ">
                                @forelse ($recentPosts as $index => $item)
                                    <li class="r-post-item"><a class="r-post-link" href="#">
                                            <div class="r-post-img-wrapper"><img class="r-post-img" loading="lazy"
                                                    src="{{asset('storage/' . ($item->image ?? NO_IMAGE))}}"
                                                    alt="recent post image {{$index + 1}}">
                                            </div>
                                            <div class="content">
                                                <h6 class="r-post-title">{{$item->title}}</h6><span
                                                    class="r-post-date">{{ \Carbon\Carbon::parse($item->published_at)->format('M, d Y') }}</span>
                                            </div>
                                        </a></li>
                                @empty
                                    <p class="text-danger">No recent posts</p>
                                @endforelse
                            </ul>
                        </div>
                        {{-- <div class="tags sidebar-box">
                            <h6 class="sidebar-box-title">
                                tags:</h6>
                            <ul class="sidebar-list tags-list ">
                                <li class="tag-item"><a class="tag-link" href="#">wordpress</a></li>
                            </ul>
                        </div> --}}
                        <div class="follow-us sidebar-box">
                            <h6 class="sidebar-box-title">
                                follow us on:</h6>
                            <div class="sc-wrapper dir-row sc-size-32">
                                @php
$setups = App\Models\Setup::setupData();
                                @endphp
                                <ul class="sc-list">
                                    <li class="sc-item " title="Facebook"><a class="sc-link"
                                            href="{{$setups['facebook_link'] ?? ''}}" title="social media icon"><i
                                                class="fab fa-facebook-f sc-icon"></i></a>
                                    </li>
                                    <li class="sc-item " title="youtube"><a class="sc-link"
                                            href="{{$setups['youtube_link'] ?? ''}}" title="social media icon"><i
                                                class="fab fa-youtube sc-icon"></i></a>
                                    </li>
                                    <li class="sc-item " title="instagram"><a class="sc-link"
                                            href="{{$setups['instagram_link'] ?? ''}}" title="social media icon"><i
                                                class="fab fa-instagram sc-icon"></i></a>
                                    </li>
                                    <li class="sc-item " title="X"><a class="sc-link" href="{{$setups['x_link'] ?? ''}}"
                                            title="social media icon"><i class="fab fa-x-twitter sc-icon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog-1-col-posts-->
</div>