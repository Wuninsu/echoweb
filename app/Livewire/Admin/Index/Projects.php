<?php

namespace App\Livewire\Admin\Index;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;
    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount() {}


    public function confirmDelete($id)
    {
        $this->dispatch('confirm', id: $id);
    }

    #[On('delete')]
    public function handleDelete($id)
    {
        $project = Project::findOrFail($id);
        if ($project) {
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            $project->delete();
            sweetalert()->success('Project deleted successfully.');
        } else {
            sweetalert()->error('Project not found.');
        }

        $this->reset();
    }



    #[Title('Projects')]
    public function render()
    {
        // Cache::put("user_phone", auth('web')->user()->phone, now()->addMinutes(2));

        $projects = Project::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('client', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.index.projects', [
            'projects' => $projects
        ]);
    }
}
