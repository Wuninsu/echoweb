<?php

namespace App\Livewire\Guest;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Faqs extends Component
{
    public function render()
    {
        seo()
            ->site('Echo Edge Digital Solutions — FAQs')
            ->title('FAQs - ' . config('app.name', 'Echo Edge'))
            ->description('Find answers to frequently asked questions about Echo Edge Digital Solutions, our services, support, and how we work.')
            ->keywords('Echo Edge FAQs, frequently asked questions, support, Echo Edge help, Echo Edge customer service, Echo Edge Ghana')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('header.png'))
            ->flipp('faqs', 'o1vhcg5npgfu')
            ->twitterSite('@echoedgeds');

        return view('livewire.guest.faqs');
    }
}
