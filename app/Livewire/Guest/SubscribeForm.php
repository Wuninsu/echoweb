<?php

namespace App\Livewire\Guest;

use App\Models\Subscriber;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class SubscribeForm extends Component
{
    public $email;

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.unique' => 'You have already subscribed with this email address.',
        ]);

        Subscriber::create(['email' => $this->email]);

        $this->reset('email');

        session()->flash('success', 'Thanks for subscribing!');
    }

    public function render()
    {
        return view('livewire.guest.subscribe-form');
    }
}
