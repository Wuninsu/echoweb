<?php

namespace App\Livewire\Admin\Index;

use App\Models\Testimony;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Testimonies extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name, $position, $message, $image, $is_active, $showImg;
    public $testimony_id;
    public $search = '';
    protected $queryString = [
        'search' => ['except' => ''],
        'role' => ['except' => ''],
    ];
    public function mount() {}

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ];
    }



    public function confirmDelete($id)
    {
        $this->dispatch('confirm', id: $id);
    }

    #[On('delete')]
    public function delete($id)
    {
        $testimony = Testimony::findOrFail($id);
        if ($testimony) {
            // Check if the testimony has an image
            if ($testimony->image && Storage::disk('public')->exists($testimony->image)) {
                Storage::disk('public')->delete($testimony->image);
            }
            // Delete testimony from database
            $testimony->delete();
            flash()->success('Testimony deleted successfully.');
        } else {
            flash()->error('No testimony was found');
        }
    }


    public function loadTestimonyData($id)
    {
        $testimony = Testimony::findOrFail($id);
        if ($testimony) {
            $this->testimony_id = $testimony->id;
            $this->name = $testimony->name;
            $this->position = $testimony->position;
            $this->is_active = $testimony->is_active == 1 ? true : false;
            $this->showImg = $testimony->image;
            $this->message = $testimony->message;
            $this->dispatch('show-modal');
        }
    }



    public function createOrUpdateSlider()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            $testimony = Testimony::find($this->testimony_id);
            $filePath = $testimony ? $testimony->image : null;

            // Handle file upload if a new image is selected
            if ($this->image) {
                if ($filePath && Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
                $filePath = uploadFile($this->image, 'testimony');
            }

            if ($this->testimony_id) {
                // Update existing testimony
                $testimony->update([
                    'name' => strip_tags($this->name),
                    'position' => strip_tags($this->position),
                    'message' => strip_tags($this->message),
                    'image' => $filePath,
                    'is_active' => $this->is_active,
                ]);
            } else {
                // Create new slide
                Testimony::create([
                    'name' => strip_tags($this->name),
                    'position' => strip_tags($this->position),
                    'message' => strip_tags($this->message),
                    'image' => $filePath,
                    'is_active' => $this->is_active,
                ]);
            }

            DB::commit(); // ✅ Commit changes if everything is successful

            flash()->success($this->testimony_id ? 'Testimony updated successfully' : 'Testimony created successfully');
            $this->resetPage();
            $this->dispatch('close-modal');
        } catch (\Exception $e) {
            DB::rollBack();
            flash()->error('Something went wrong! ' . $e->getMessage());
        }
    }


    public function resetPage()
    {
        $this->reset(['name', 'position', 'image', 'message', 'is_active', 'showImg', 'testimony_id']);
    }

    #[Title('Testimonies')]
    public function render()
    {
        $testimonials = Testimony::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('position', 'like', '%' . $this->search . '%');
            })
            ->latest()->paginate(paginationLimit());
        return view('livewire.admin.index.testimonies', ['testimonials' => $testimonials]);
    }
}
