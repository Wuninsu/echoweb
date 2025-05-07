<?php

namespace App\Livewire\Guest;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class About extends Component
{
    public function render()
    {
        seo()
            ->site('Echo Edge Digital Solutions — Who We Are')
            ->title('About Us - ' . config('app.name', 'Echo Edge'))
            ->description('Learn more about Echo Edge Digital Solutions — a Tamale-based company delivering impactful tech services tailored to Africa’s digital future.')
            ->keywords('About Echo Edge, Echo Edge team, Tamale tech company, African digital innovation, Laravel experts Ghana')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('header.png'))
            ->flipp('about', 'o1vhcg5npgfu')
            ->twitterSite('@echoedgeds');

        return view('livewire.guest.about');
    }
}
