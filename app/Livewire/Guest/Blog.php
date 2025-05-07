<?php

namespace App\Livewire\Guest;

use App\Models\Blog as ModelsBlog;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.guest')]
class Blog extends Component
{
    use WithPagination;
    public function render()
    {
        seo()
            ->site('Echo Edge Digital Solutions — Insights and Innovations')
            ->title('Blog - ' . config('app.name', 'Echo Edge'))
            ->description('Explore expert articles and insights from Echo Edge on web development, USSD, facial recognition, and modern tech solutions for African businesses.')
            ->keywords('Echo Edge blog, tech articles Ghana, web development tips, USSD tutorials, Laravel Ghana blog, digital innovation Africa')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('header.png'))
            ->flipp('blog', 'o1vhcg5npgfu')
            ->twitterSite('@echoedgeds');

        $blogs = ModelsBlog::where('status', 'published')
            ->latest('published_at')
            ->paginate(6); // 6 posts per page
        return view('livewire.guest.blog', compact('blogs'));
    }
}
