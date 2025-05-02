<?php

namespace App\Livewire\Admin\Index;

use Livewire\Attributes\Title;
use Livewire\Component;

class Subscribers extends Component
{
    #[Title('Subscribers')]
    public function render()
    {
        return view('livewire.admin.index.subscribers');
    }
}
