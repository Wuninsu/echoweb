<?php

namespace App\Livewire\Guest;

use App\Models\Setup;
use App\Models\Testimony;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class About extends Component
{
    public $settings;
    public $testimonies;
    public function mount()
    {
        $this->testimonies = Testimony::where('is_active', true)->get();
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
            ->site('Echo Edge Digital Solutions — Who We Are')
            ->title('About Us - ' . config('app.name', 'Echo Edge'))
            ->description('Learn more about Echo Edge Digital Solutions — a Tamale-based company delivering impactful tech services tailored to Africa’s digital future.')
            ->keywords('About Echo Edge, Echo Edge team, Tamale tech company, African digital innovation, Laravel experts Ghana')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset('header.png'))
            ->flipp('about', 'o1vhcg5npgfu')
            ->twitterSite('@echoedgeds');

        $teamMembers =   User::query()->with('info')
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['super-admin', 'admin', 'staff']);
            })->latest()->get();
        return view('livewire.guest.about', compact('teamMembers'));
    }
}
