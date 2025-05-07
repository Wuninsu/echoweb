<?php

namespace App\Livewire\Guest;

use App\Models\Blog;
use App\Models\Service;
use App\Models\Slider;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Home extends Component
{
    public $sliders;
    public $services;
    public $blogs;

    public function mount()
    {
        $this->sliders = Slider::where('is_active', true)
            ->orderBy('order')
            ->get();
        $this->services = Service::orderBy('id')->get();
        $this->blogs = Blog::where('status', 'published')
            ->latest('published_at')
            ->limit(3)->get();
    }

    public function render()
    {

        seo()
            ->site('Echo Edge Digital Solutions — Transforming Ideas Into Digital Solutions')
            ->title('Home - ' . config('app.name', 'Echo Edge'))
            ->description('Echo Edge Digital Solutions offers innovative web applications, USSD platforms, school management systems, and facial recognition solutions tailored for African businesses and institutions.')
            ->keywords('Echo Edge, USSD solutions, Web applications Ghana, School management software, Facial recognition system, Digital solutions Tamale, Laravel development Ghana')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('header.png'))
            ->flipp('blog', 'o1vhcg5npgfu')
            ->twitterSite('@echoedgeds');

        return view('livewire.guest.home');
    }
}
