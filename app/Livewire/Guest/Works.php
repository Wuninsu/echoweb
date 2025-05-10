<?php

namespace App\Livewire\Guest;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Works extends Component
{
    public $works;
    public function mount()
    {
        $this->works = Project::where('is_visible', true)->latest()->get();
    }
    public function render()
    {
        seo()
            ->site('Echo Edge Digital Solutions — Transforming Ideas Into Digital Solutions')
            ->title('Works - ' . config('app.name', 'Echo Edge'))
            ->description('Echo Edge Digital Solutions offers innovative web applications, USSD platforms, school management systems, and facial recognition solutions tailored for African businesses and institutions.')
            ->keywords('Echo Edge, USSD solutions, Web applications Ghana, School management software, Facial recognition system, Digital solutions Tamale, Laravel development Ghana')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('header.png'))
            ->flipp('blog', 'o1vhcg5npgfu')
            ->twitterSite('@echoedgeds');
        $projects = Project::where('is_visible', true)->latest()->get();
        return view('livewire.guest.works', compact('projects'));
    }
}
