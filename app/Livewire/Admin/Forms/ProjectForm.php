<?php

namespace App\Livewire\Admin\Forms;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectForm extends Component
{
    use WithFileUploads;

    public $status, $slug, $project_id;
    public $title, $client;
    public $start_date;
    public $end_date;
    public $description;
    public $image, $showImg;


    public function rules()
    {
        return [
            'title' => 'required|min:4|max:255',
            'client' => 'required|string',
            'slug' => 'nullable|string',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable|boolean',
            'start_date' => 'nullable|date|before_or_equal:end_date',
            'end_date' => 'nullable|date|after_or_equal:start_date'
        ];
    }

    public function mount(Project $project)
    {
        if ($project) {
            $this->title = $project->title;
            $this->client = $project->client;
            $this->start_date = $project->start_date;
            $this->status = $project->status == 1 ? true : false;
            $this->showImg = $project->image;
            $this->description = $project->description;
            $this->end_date = $project->end_date;
            $this->project_id = $project->id;
            $this->slug = $project->slug;
        }
    }


    public function save()
    {
        $this->validate();

        $project = Project::find($this->project_id);
        $filePath = $project ? $project->image : null;

        // Handle file upload if a new image is selected
        if ($this->image) {
            if ($filePath) {
                if (Storage::disk('public')->exists($project->image)) {
                    Storage::disk('public')->delete($project->image);
                }
            }
            $filePath = uploadFile($this->image, 'projects');
        }


        Project::updateOrCreate(
            ['id' => $this->project_id],
            [
                'title' => $this->title,
                'client' => $this->client,
                'description' => $this->description,
                'start_date' => $this->start_date ?? Carbon::today(),
                'end_date' => $this->end_date ?? Carbon::today()->addDays(30),
                'status' => $this->status ? 1 : 0,
                'image' => $filePath,
                'slug' => $this->slug,
            ]
        );

        if (!$this->project_id) {
            $this->reset();
        }
        sweetalert()->success($this->project_id ? 'Project updated successfully!' : 'project created successfully!');
        $this->reset();
        return redirect()->route('projects.index');
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'title') {
            $this->slug = Str::slug($this->title) . '-' . rand(100000, 999999);
        }
    }

    // private function generateSKU()
    // {
    //     // Fetch category and supplier names from their respective models
    //     $category = CategoriesModel::find($this->category);
    //     $supplier = SuppliersModel::find($this->supplier);

    //     // Get first 3 letters of each attribute
    //     $namePart = strtoupper(substr($this->name, 0, 3));
    //     $categoryPart = $category ? strtoupper(substr($category->name, 0, 3)) : 'XXX';
    //     $supplierPart = $supplier ? strtoupper(substr($supplier->company_name, 0, 3)) : 'YYY';

    //     // Generate a random 4-digit number to ensure uniqueness
    //     $randomNumber = rand(1000, 9999);

    //     // Combine parts to form SKU
    //     return "{$namePart}-{$categoryPart}-{$supplierPart}-{$randomNumber}";
    // }


    #[Title('Manage projects')]
    public function render()
    {
        return view('livewire.admin.forms.project-form');
    }
}
