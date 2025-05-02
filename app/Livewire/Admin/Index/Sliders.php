<?php

namespace App\Livewire\Admin\Index;

use Livewire\Attributes\Title;
use Livewire\Component;

class Sliders extends Component
{
    #[Title('Sliders')]
    public function render()
    {
        return view('livewire.admin.index.sliders');
    }
}
