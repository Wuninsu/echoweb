<?php

namespace App\Livewire\Admin\Forms;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Service;
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
    public $start_date, $end_date;
    public $description;
    public $image, $showImg;
    public $service_id, $featured, $url, $technologies, $is_visible;

    public $services;

    public $images = [];
    public $existingImages = [];

    public $selectedImage;
    public $newImage;

    public function updatedImages()
    {
        $this->validate([
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    }
    public function rules()
    {
        return [
            'title' => 'required|min:4|max:255',
            'client' => 'required|string',
            'slug' => 'nullable|string',
            'description' => 'required|string|max:1000',
            'status' => 'nullable|boolean',
            'start_date' => 'nullable|date|before_or_equal:end_date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'service_id' => 'nullable|exists:services,id',
            'featured' => 'nullable|boolean',
            'url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'is_visible' => 'nullable|boolean',
            'images' => $this->project_id ? 'nullable|array' : 'required|array',
            'images.*' => $this->project_id
                ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
                : 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function mount(Project $project)
    {
        if ($project) {

            $this->title = $project->title;
            $this->client = $project->client;
            $this->start_date = $project->start_date;
            $this->status = $project->status == 'completed' ? true : false;
            $this->showImg = $project->image;
            $this->description = $project->description;
            $this->end_date = $project->end_date;
            $this->project_id = $project->id;
            $this->slug = $project->slug;
            $this->service_id = $project->service_id;
            $this->featured = $project->featured;
            $this->url = $project->url;
            $this->technologies = $project->technologies;
            $this->is_visible = $project->is_visible;
            $this->images = [];
            $this->existingImages = $project->images;
        }

        $this->services = Service::all();
    }

    public function save()
    {
        $this->validate();

        // Create or update the project
        $project =  Project::updateOrCreate(
            ['id' => $this->project_id],
            [
                'title' => $this->title,
                'client' => $this->client,
                'description' => $this->description,
                'start_date' => $this->start_date ?? Carbon::today(),
                'end_date' => $this->end_date ?? Carbon::today()->addDays(30),
                'status' => $this->status ? 'completed' : 'ongoing',
                'slug' => $this->slug ?? Str::slug($this->title),
                'service_id' => $this->service_id,
                'featured' => $this->featured,
                'url' => $this->url,
                'technologies' => json_encode([$this->technologies]),
                'is_visible' => $this->is_visible,
            ]
        );

        if (!empty($this->images)) {
            // Delete existing project images (DB + storage)
            foreach ($project->images as $image) {
                if (Storage::disk('public')->exists($image->path)) {
                    Storage::disk('public')->delete($image->path);
                }
                $image->delete();
            }

            // Upload new images
            foreach ($this->images as $img) {
                $path = uploadFile($img, 'projects/' . $project->id);
                $project->images()->create([
                    'path' => $path,
                ]);
            }
        }


        // Reset the form and show success message
        sweetalert()->success($this->project_id ? 'Project updated successfully!' : 'Project created successfully!');
        $this->reset();
        return redirect()->route('projects.index');
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'title') {
            $this->slug = Str::slug($this->title) . '-' . rand(100000, 999999);
        }
    }


    public function selectImageForUpdate($id)
    {
        $this->selectedImage = ProjectImage::findOrFail($id);
    }

    public function updateImage()
    {
        if ($this->newImage) {
            $this->validate([
                'newImage' => 'image|max:2048',
            ]);

            // Delete old image from storage
            Storage::disk('public')->delete($this->selectedImage->path);

            // Save new image
            $filePath = uploadFile($this->newImage, 'projects/' . $this->project_id);
            if ($this->selectedImage->path) {
                if ($filePath) {
                    if (Storage::disk('public')->exists($this->selectedImage->path)) {
                        Storage::disk('public')->delete($this->selectedImage->path);
                    }
                }
            }

            // Update database record
            $this->selectedImage->update(['image_path' => $filePath]);
            flash()->success('Image updated successfully.');
        }

        $this->dispatch('close-update-modal');
    }

    #[Title('Manage projects')]
    public function render()
    {
        return view('livewire.admin.forms.project-form');
    }
}
