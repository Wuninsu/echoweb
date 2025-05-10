<div>
    <div class="blog blog-post ">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <!--post heading area2021-->
                    <div class="social">
                        <div class="share-us ">
                            <h6 class="share-title">share post:</h6>
                            <div class="sc-wrapper dir-row sc-flat">
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_email"></a>
                                    <a class="a2a_button_whatsapp"></a>
                                    <a class="a2a_button_x"></a>
                                </div>
                                <script defer src="https://static.addtoany.com/menu/page.js"></script>
                            </div>
                        </div>
                    </div>
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <div class="post-img-wrapper post-featured-area"><img class="featured-img" loading="lazy"
                            src="{{ asset('storage/' . ($post->image ?? NO_IMAGE)) }}" alt="{{$post->slug}}"></div>
                </div>
                <div class="col-12 col-lg-9 mx-auto">
                    <div class="post-main-area">
                        <div class="post-info"><a class="info post-cat" href="#"><i
                                    class="fas fa-list-alt icon"></i>{{ $post->service->title ?? 'Service' }}</a><a
                                class="info post-author" href="#">
                                <i class="fas fa-user icon"></i>{{ $post->author->name ?? 'Unknown Author' }}</a><a
                                class="info post-date" href="#"><i
                                    class="fas fa-history icon"></i>{{ $post->published_at->format('d/m/Y') }}</a><a
                                class="info post-time" href="#"><i
                                    class="fas fa-eye icon"></i>{{ $post->views ?? '20' }}</a><a
                                class="info post-comments-count" href="#"><i
                                    class="fas fa-comments icon"></i>{{ count($post->comments) }}</a>
                        </div>
                        <div class="post-content">
                            <p class=" first-litter post-text">
                                {!! $post->content !!}
                            </p>
                        </div>
                        <!--tags panel-->
                        <div class="tags panel">
                            <ul class="sidebar-list tags-list ">
                                <li class="tags-icon-label "><i class="fas fa-tags icon"></i></li>
                                <li class="tag-item"><a class="tag-link" href="#">cloud</a></li>
                            </ul>
                        </div>
                        <!--author profile panel-->
                        <div class="author-profile panel">
                            <h6 class="panel-title">about author</h6>
                            <div class="author-info">
                                <div class="author-avatar"><a class="author-link" href="#"><img class="avatar-img"
                                            loading="lazy"
                                            src="{{ $post->author->avatar ?? asset('storage/' . ($post->author->avatar ?? NO_IMAGE)) }}"
                                            alt="author avatar"></a>
                                </div>
                                <div class="author-disc">
                                    <h6 class="author-name"> <a class="author-link"
                                            href="#">{{ $post->author->name ?? 'Unknown Author' }}</a></h6>
                                    <p class="author-bio">
                                        {{ $post->author->info->bio ?? 'This author has not added a bio yet.' }}
                                    </p>
                                    <div class="sc-wrapper dir-row sc-size-32">
                                        <ul class="sc-list">
                                            @if (!empty($post->author->info->facebook_link))
                                                <li class="sc-item" title="Facebook"><a class="sc-link"
                                                        href="{{ $post->author->info->facebook_link }}"><i
                                                            class="fab fa-facebook-f sc-icon"></i></a></li>
                                            @endif
                                            @if (!empty($post->author->info->youtube_link))
                                                <li class="sc-item" title="YouTube"><a class="sc-link"
                                                        href="{{ $post->author->info->youtube_link }}"><i
                                                            class="fab fa-youtube sc-icon"></i></a></li>
                                            @endif
                                            @if (!empty($post->author->info->linkedin_link))
                                                <li class="sc-item" title="Linkedin"><a class="sc-link"
                                                        href="{{ $post->author->info->linkedin_link }}"><i
                                                            class="fab fa-linkedin sc-icon"></i></a></li>
                                            @endif
                                            @if (!empty($post->author->info->x_link))
                                                <li class="sc-item" title="X"><a class="sc-link"
                                                        href="{{ $post->author->info->x_link }}"><i
                                                            class="fab fa-x-twitter sc-icon"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
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
                                                        style="object-fit: cover; width: 100%; height: 300px;">
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
                        <div class="col-12 col-lg-8">
                            <!--comments area panel-->
                            <div class="comments-area panel">
                                <h6 class="panel-title">comments</h6>
                                @forelse ($comments as $comment)
                                    <div class="comment-wrapper">
                                        <div class="author-avatar"><img
                                                src="{{ asset('storage/' . ($comment->user->avatar ?? NO_IMAGE)) }}"
                                                alt="user avatar" class="img-fluid">
                                        </div>
                                        <div class="comment-body">
                                            <div class="comment-author">{{ $comment->user->name ?? ($name ?? 'Guest') }}
                                            </div>
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
                                            <div class="author-avatar"><img class="avatar-img"
                                                    src="{{ asset('storage/' . ($reply->user->avatar ?? NO_IMAGE)) }}"
                                                    alt="user avatar" width="100%"></div>
                                            <div class="comment-body">
                                                <div class="comment-author">{{ $reply->user->name ?? 'Guest' }}</div>
                                                <div class="comment-date">
                                                    <time>{{ $reply->created_at->format('M d, Y \a\t h:i A') }}</time>
                                                </div>
                                                <div class="comment-content">
                                                    <p class="comment-text">{{ $reply->comment }}</p>
                                                </div>
                                                <div class="comment-parent">
                                                    <span>Replying to: {{ $comment->user->name ?? 'Guest' }}</span>
                                                </div>
                                                <div class="reply-action">
                                                    <a href="#" wire:click.prevent="setReply({{ $reply->id }})">reply <i
                                                            class="fas fa-share-square icon"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach ($reply->replies as $thirdLevelReply)
                                            <div class="comment-wrapper comment-reply ms-5">
                                                <div class="author-avatar">
                                                    <img class="avatar-img" width="100%"
                                                        src="{{ asset('storage/' . ($thirdLevelReply->user->avatar ?? NO_IMAGE)) }}"
                                                        alt="user avatar">
                                                </div>
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
                                                        <a href="#" wire:click.prevent="setReply({{ $thirdLevelReply->id }})">reply
                                                            <i class="fas fa-share-square icon"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                @empty

                                    <div class="alert alert-info text-center" role="alert">
                                        <strong>No comments available.</strong> Be the first to share your thoughts!
                                    </div>
                                @endforelse
                            </div>
                            <!--add reply area panel-->
                            <div class="panel" id="comment-form">
                                <h6 class="panel-title">{{ $parentId ? 'Reply to comment' : 'Leave your comment' }}</h6>
                                <div class="custom-form-area input-boxed">
                                    <form wire:submit.prevent="submitComment" class="main-form">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="input-wrapper">
                                                    <label class="input-label" for="user-name"> Name <span
                                                            class="req">*</span></label>
                                                    <input wire:model="name" type="text" id="user-name"
                                                        class="text-input @error('name') border-danger is-invalid @enderror"
                                                        placeholder="Your Name">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="input-wrapper">
                                                    <label class="input-label" for="user-email"> E-Mail <span
                                                            class="req">*</span></label>
                                                    <input wire:model="email" type="email" id="user-email"
                                                        class="text-input @error('email') border-danger is-invalid @enderror"
                                                        placeholder="Your Email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-wrapper">
                                                    <label class="input-label" for="user-content">Comment<span
                                                            class="req">*</span></label>
                                                    <textarea wire:model="comment"
                                                        class="text-input @error('comment') border-danger is-invalid @enderror"
                                                        id="user-content" placeholder="Your comment"></textarea>
                                                    @error('comment')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 submit-wrapper">
                                                @if (session()->has('message'))
                                                    <div class="alert alert-success">{{ session('message') }}</div>
                                                @endif
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
        </div>
    </div>
    <script>
        window.addEventListener('scroll-to-comment-form', () => {
            document.getElementById('comment-form').scrollIntoView({ behavior: 'smooth' });
        });
    </script>

</div>