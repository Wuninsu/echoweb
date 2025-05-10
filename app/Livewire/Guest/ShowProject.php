<?php

namespace App\Livewire\Guest;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class ShowProject extends Component
{
    public $project;
    public function mount(Project $project)
    {
        $this->project = $project;
    }
    public function render()
    {
        seo()
            ->title($this->project->title . ' - ' . config('app.name', 'Echo Edge'))
            ->description(\Illuminate\Support\Str::limit(strip_tags($this->project->description), 150))
            ->keywords($this->project->title . ', Echo Edge Projects, Digital Solutions, Web Development')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset($this->project->image ?? 'header.png'))
            ->flipp('project', 'o1vhcg5npgfu')
            ->twitterSite('@echoedgeds');

        return view('livewire.guest.show-project');
    }
}
