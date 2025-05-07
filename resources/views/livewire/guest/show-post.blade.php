<div>
    <!-- Start _post -->
    <section class="blog blog-post ">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <!--post heading area-->
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                            <li class="breadcrumb-item">
                                <a class="breadcrumb-link" href="{{ route('home') }}">
                                    <i class="fas fa-home icon"></i> home
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="breadcrumb-link" href="{{ route('blog') }}">
                                    Blog
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ Str::limit($post->title, 30) }}
                            </li>
                        </ul>
                    </nav>

                    <h2 class="post-title">{{ $post->title }} </h2>
                    <div class="social">
                        <div class="share-us ">
                            <h6 class="share-title">share post:</h6>
                            <div class="sc-wrapper dir-row sc-size-32">
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_email"></a>
                                    <a class="a2a_button_whatsapp"></a>
                                    <a class="a2a_button_twitter"></a>
                                    <a class="a2a_button_x"></a>
                                    <a class="a2a_button_linkedin"></a>
                                </div>
                                <script defer src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </div>
                        </div>
                    </div>
                    <div class="post-img-wrapper post-featured-area"><img class="featured-img"
                            src="{{ asset('storage/' . ($post->image ?? NO_IMAGE)) }}" alt="Featured Image"></div>
                </div>
                <div class="col-12 col-lg-9 mx-auto">
                    <div class="post-main-area">
                        <div class="post-info">
                            <a class="info post-cat" href="#">
                                <i class="fas fa-list-alt icon"></i>{{ $post->category->name ?? 'Category' }}
                                <!-- Assuming you have a category relationship -->
                            </a>
                            <a class="info post-author" href="#">
                                <i class="fas fa-user icon"></i>{{ $post->author->name ?? 'Unknown Author' }}
                                <!-- Assuming you have an author relationship -->
                            </a>
                            <a class="info post-date" href="#">
                                <i class="fas fa-history icon"></i>{{ $post->published_at->format('d/m/Y') }}
                            </a>
                            <a class="info post-time" href="#">
                                <i class="fas fa-eye icon"></i>{{ $post->views }}
                            </a>
                            <a class="info post-comments-count" href="#">
                                <i class="fas fa-comments icon"></i>{{ $post->comments_count }}
                            </a>
                        </div>

                        <div class="post-content">
                            <p class="first-litter post-text">
                                {!! $post->content !!}
                            </p>
                        </div>

                        <!--tags panel-->
                        <div class="tags panel">
                            <ul class="sidebar-list tags-list ">
                                <li class="tags-icon-label "><i class="fas fa-tags icon"></i></li>
                                <li class="tag-item"><a class="tag-link" href="#">furniture</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">decoration</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">planning</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">design</a></li>
                                <li class="tag-item"><a class="tag-link" href="#">developing </a></li>
                                <li class="tag-item"><a class="tag-link" href="#">exterior</a></li>
                            </ul>
                        </div>
                        <!--author profile panel-->
                        <div class="author-profile panel">
                            <h6 class="panel-title">about author</h6>
                            <div class="author-avatar">
                                <a class="author-link" href="#">
                                    <img class="avatar-img"
                                        src="{{ $post->author->avatar ?? asset('storage/' . ($post->author->avatar ?? NO_IMAGE)) }}"
                                        alt="author avatar">
                                </a>
                            </div>
                            <div class="author-disc">
                                <h6 class="author-name">
                                    <a class="author-link" href="#">{{ $post->author->name ?? 'Unknown Author' }}</a>
                                </h6>
                                <p class="author-bio">
                                    {{ $post->author->bio ?? 'This author has not added a bio yet.' }}
                                </p>
                                <div class="sc-wrapper dir-row sc-size-32">
                                    <ul class="sc-list">
                                        @if (!empty($post->author->facebook))
                                            <li class="sc-item" title="Facebook"><a class="sc-link"
                                                    href="{{ $post->author->facebook }}"><i
                                                        class="fab fa-facebook-f sc-icon"></i></a></li>
                                        @endif
                                        @if (!empty($post->author->youtube))
                                            <li class="sc-item" title="YouTube"><a class="sc-link"
                                                    href="{{ $post->author->youtube }}"><i
                                                        class="fab fa-youtube sc-icon"></i></a></li>
                                        @endif
                                        @if (!empty($post->author->instagram))
                                            <li class="sc-item" title="Instagram"><a class="sc-link"
                                                    href="{{ $post->author->instagram }}"><i
                                                        class="fab fa-instagram sc-icon"></i></a></li>
                                        @endif
                                        @if (!empty($post->author->twitter))
                                            <li class="sc-item" title="X"><a class="sc-link"
                                                    href="{{ $post->author->twitter }}"><i
                                                        class="fab fa-x-twitter sc-icon"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--other-posts panel-->
                        <div class="other-posts panel">
                            <h6 class="panel-title">posts by the author</h6>
                            <div class="row">
                                @foreach ($post->author->posts->where('id', '!=', $post->id)->take(2) as $otherPost)
                                    <div class="col-12 col-sm-6 mb-3">
                                        <div class="{{ $loop->first ? 'prev-post' : 'next-post' }} border">
                                            <a class="other-post-link" href="{{ route('posts.show', $otherPost->slug) }}">
                                                <div class="other-post-img"
                                                    title="{{ $loop->first ? 'Previous Post' : 'Next Post' }}">
                                                    <img class="img-fluid"
                                                        src="{{ asset('storage/' . ($otherPost->image ?? 'NO_IMAGE')) }}"
                                                        alt="{{ $otherPost->title }}"
                                                        style="object-fit: cover; width: 100%; height: 100%;">
                                                    <i class="fas fa-arrow-{{ $loop->first ? 'left' : 'right' }} icon"></i>
                                                </div>
                                                <h6 class="other-post-title p-2">{{ Str::limit($otherPost->title, 30) }}
                                                </h6>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <style>
                            .other-post-img {
                                position: relative;
                                width: 100%;
                                height: 200px;
                                /* Set a fixed height */
                                overflow: hidden;
                            }

                            .other-post-img img {
                                object-fit: cover;
                                /* Ensure the image covers the container */
                                width: 100%;
                                height: 100%;
                            }
                        </style>

                        <!--comments area panel-->
                        <div class="comments-area panel">
                            <h6 class="panel-title">Comments</h6>

                            @foreach ($comments as $comment)
                                <div class="comment-wrapper">
                                    <div class="author-avatar"><img src="{{ asset('assets/images/blog/avatars/2.jpg') }}"
                                            alt="author avatar"></div>
                                    <div class="comment-body">
                                        <div class="comment-author">{{ $comment->user->name ?? ($name ?? 'Guest') }}</div>
                                        <div class="comment-date">
                                            <time>{{ $comment->created_at->format('M d, Y \a\t h:i A') }}</time>
                                        </div>
                                        <div class="comment-content">
                                            <p class="comment-text">{{ $comment->comment }}</p>
                                        </div>
                                        <div class="reply-action">
                                            <a href="#" wire:click.prevent="setReply({{ $comment->id }})">reply <i
                                                    class="fas fa-share-square icon"></i></a>
                                        </div>
                                    </div>
                                </div>

                                @foreach ($comment->replies as $reply)
                                    <div class="comment-wrapper comment-reply">
                                        <div class="author-avatar"><img src="{{ asset('assets/images/blog/avatars/3.jpg') }}"
                                                alt="author avatar"></div>
                                        <div class="comment-body">
                                            <div class="comment-author">{{ $reply->user->name ?? 'Guest' }}</div>
                                            <div class="comment-date">
                                                <time>{{ $reply->created_at->format('M d, Y \a\t h:i A') }}</time>
                                            </div>
                                            <div class="comment-content">
                                                <p class="comment-text">{{ $reply->comment }}</p>
                                            </div>
                                            <div class="reply-action">
                                                <a href="#" wire:click.prevent="setReply({{ $reply->id }})">reply <i
                                                        class="fas fa-share-square icon"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach ($reply->replies as $thirdLevelReply)
                                        <div class="comment-wrapper comment-reply">
                                            <div class="author-avatar"><img src="{{ asset('assets/images/blog/avatars/4.jpg') }}"
                                                    alt="author avatar"></div>
                                            <div class="comment-body">
                                                <div class="comment-author">{{ $thirdLevelReply->user->name ?? 'Guest' }}</div>
                                                <div class="comment-date">
                                                    <time>{{ $thirdLevelReply->created_at->format('M d, Y \a\t h:i A') }}</time>
                                                </div>
                                                <div class="comment-content">
                                                    <p class="comment-text">{{ $thirdLevelReply->comment }}</p>
                                                </div>

                                                {{-- Show Parent Name (Second-Level Comment Author) --}}
                                                <div class="comment-parent">
                                                    <span>Replying to: {{ $reply->user->name ?? 'Guest' }}</span>
                                                </div>

                                                <div class="reply-action">
                                                    <a href="#" wire:click.prevent="setReply({{ $thirdLevelReply->id }})">reply <i
                                                            class="fas fa-share-square icon"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </div>

                        <!-- comment form -->
                        <div class="panel mt-4" id="comment-form">
                            <h6 class="panel-title">{{ $parentId ? 'Reply to comment' : 'Leave your comment' }}</h6>
                            <div class="contact-form-area input-boxed">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">{{ session('message') }}</div>
                                @endif

                                <form wire:submit.prevent="submitComment" class="main-form">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="input-wrapper">
                                                <input wire:model.defer="name" type="text" class="text-input"
                                                    placeholder="Your Name">
                                                @error('name')
                                                    <span class="error-msg text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="input-wrapper">
                                                <input wire:model.defer="email" type="email" class="text-input"
                                                    placeholder="Your Email">
                                                @error('email')
                                                    <span class="error-msg text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-wrapper">
                                                <textarea wire:model.defer="comment" class="text-input"
                                                    placeholder="Your comment"></textarea>
                                                @error('comment')
                                                    <span class="error-msg text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 submit-wrapper">
                                            <button type="submit" class="btn-solid">Add Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End _post -->

    <script>
        window.addEventListener('scroll-to-comment-form', () => {
            document.getElementById('comment-form').scrollIntoView({ behavior: 'smooth' });
        });
    </script>

</div>