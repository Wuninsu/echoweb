<?php

namespace App\Livewire\Settings;

use Livewire\Attributes\Title;
use Livewire\Component;

class Appearance extends Component
{
    public $theme = 'system';

    #[Title('Settings')]
    public function updatedTheme($value)
    {
        $this->dispatch('theme-changed', data: ['theme' => $value]);
    }
}
