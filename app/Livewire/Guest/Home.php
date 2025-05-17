<?php

namespace App\Livewire\Guest;

use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setup;
use App\Models\Slider;
use App\Models\Testimony;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Home extends Component
{
    public $sliders;
    public $services;
    public $blogs;

    public $testimonies;
    public $projects;

    public $settings;

    public function mount()
    {
        $this->sliders = Slider::where('is_active', true)
            ->orderBy('order')
            ->get();
        $this->services = Service::orderBy('id')->get();
        $this->blogs = Blog::where('status', 'published')
            ->latest('published_at')
            ->limit(3)->get();

        $this->testimonies = Testimony::where('is_active', true)->get();
        $this->projects = Project::where('featured', true)->where('is_visible', true)->latest()->get();

        $settingsData = Setup::all();

        foreach ($settingsData as $setting) {
            if (in_array($setting->key, ['why_choose_us_points'])) {
                $this->settings[$setting->key] = json_decode($setting->value, true) ?? [];
            } else {
                $this->settings[$setting->key] = $setting->value;
            }
        }
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
            ->image(default: fn() => asset('storage/' . setupData('favicon')))
            ->flipp('blog', 'o1vhcg5npgfu')
            ->twitterSite('@voteprompt');

        return view('livewire.guest.home');
    }
}
