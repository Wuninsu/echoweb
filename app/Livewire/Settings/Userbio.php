<?php

namespace App\Livewire\Settings;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Userbio extends Component
{
    public $bio, $position, $facebook_link, $x_link, $github_link, $linkedin_link;
    public $profile;

    public function mount()
    {
        $info = Auth::user()->info;

        $this->bio = $info->bio ?? '';
        $this->linkedin_link = $info->linkedin_link ?? '';
        $this->github_link = $info->github_link ?? '';
        $this->x_link = $info->x_link ?? '';
        $this->facebook_link = $info->facebook_link ?? '';
        $this->position = $info->position ?? '';
    }

    public function save()
    {
        $data = $this->validate([
            'bio' => 'nullable|string',
            'linkedin_link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'position' => 'nullable|string',
        ]);
        Auth::user()->info()->updateOrCreate([], $data);
        session()->flash('message', 'Profile updated successfully!');
    }
}
