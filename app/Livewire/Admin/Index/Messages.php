<?php

namespace App\Livewire\Admin\Index;

use Livewire\Attributes\Title;
use Livewire\Component;

class Messages extends Component
{
    #[Title('Messages')]
    public function render()
    {
        return view('livewire.admin.index.messages');
    }
}
