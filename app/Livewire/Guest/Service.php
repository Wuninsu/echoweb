<?php

namespace App\Livewire\Guest;

use App\Models\Service as ModelsService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Service extends Component
{
    public function render()
    {
        seo()
            ->site('Echo Edge Digital Solutions — Our Services')
            ->title('Services - ' . config('app.name', 'Echo Edge'))
            ->description('Discover a full range of services from Echo Edge: USSD platforms, custom web applications, school systems, and facial recognition technology.')
            ->keywords('Echo Edge services, digital services Ghana, USSD development, Laravel web apps, facial recognition system, school management software Ghana')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('storage/' . setupData('favicon')))
            ->flipp('services', 'o1vhcg5npgfu')
            ->twitterSite('@echoedgeds');
        $services = ModelsService::orderBy('id')->get();
        return view('livewire.guest.service', compact('services'));
    }
}
