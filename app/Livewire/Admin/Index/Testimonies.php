<?php

namespace App\Livewire\Admin\Index;

use Livewire\Attributes\Title;
use Livewire\Component;

class Testimonies extends Component
{
    #[Title('Testimonies')]
    public function render()
    {
        return view('livewire.admin.index.testimonies');
    }
}
