<?php

namespace App\Livewire\Admin\Forms;

use Livewire\Attributes\Title;
use Livewire\Component;

class TestimonyForm extends Component
{

    #[Title('Manage Testimonies')]
    public function render()
    {
        return view('livewire.admin.forms.testimony-form');
    }
}
