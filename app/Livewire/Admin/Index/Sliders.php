<?php

namespace App\Livewire\Admin\Index;

use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use SebastianBergmann\Type\FalseType;

class Sliders extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $title, $subtitle, $description, $button_text, $button_link, $image, $order, $is_active;
    public $slide_id, $showImg;

    #[Url]
    public $search = '';

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'button_text' => 'required|string|max:100',
            'button_link' => 'required|max:255',
            'image' => $this->slide_id ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048' : 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'order' => 'nullable|integer|min:1',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function mount() {}

    public function confirmDelete($id)
    {
        $this->dispatch('confirm', id: $id);
    }

    #[On('delete')]
    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider) {
            // Check if the slider has an image
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }
            // Delete slider from database
            $slider->delete();
            sweetalert()->success('Slider deleted successfully.');
        } else {
            sweetalert()->error('No slider was found');
        }
    }

    public function loadSliderData($id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider) {
            $this->slide_id = $slider->id;
            $this->title = $slider->title;
            $this->subtitle = $slider->subtitle;
            $this->description = $slider->description;
            $this->is_active = $slider->is_active == 1 ? true : false;
            $this->showImg = $slider->image;
            $this->button_link = $slider->button_link;
            $this->order = $slider->order;
            $this->button_text = $slider->button_text;
            $this->dispatch('show-modal');
        }
    }

    public function createOrUpdateSlider()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            $slider = Slider::find($this->slide_id);
            $filePath = $slider ? $slider->image : null;

            // Handle file upload if a new image is selected
            if ($this->image) {
                if ($filePath && Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
                $filePath = uploadFile($this->image, 'slides');
            }

            if ($this->slide_id) {
                // Update existing slide
                $slider->update([
                    'title' => $this->title,
                    'subtitle' => $this->subtitle,
                    'description' => $this->description,
                    'button_text' => $this->button_text,
                    'button_link' => $this->button_link,
                    'image' => $filePath,
                    'order' => $this->order,
                    'is_active' => $this->is_active ?? false,
                ]);
            } else {
                // Create new slide
                Slider::create([
                    'title' => $this->title,
                    'subtitle' => $this->subtitle,
                    'description' => $this->description,
                    'button_text' => $this->button_text,
                    'button_link' => $this->button_link,
                    'image' => $filePath,
                    'order' => $this->order,
                    'is_active' => $this->is_active ?? false,
                ]);
            }

            DB::commit(); // ✅ Commit changes if everything is successful

            sweetalert()->success($this->slide_id ? 'Slider updated successfully' : 'Slider created successfully');
            $this->resetPage();
            $this->dispatch('close-modal');
        } catch (\Exception $e) {
            DB::rollBack();
            sweetalert()->error('Something went wrong! ' . $e->getMessage());
        }
    }

    public function resetPage()
    {
        $this->title = null;
        $this->description = null;
        $this->image = null;
        $this->button_link = null;
        $this->button_text = null;
        $this->subtitle = null;
        $this->is_active = null;
        $this->showImg = null;
        $this->slide_id = null;
        $this->order = null;
    }

    #[Title('Sliders')]
    public function render()
    {
        $sliders = Slider::orderBy('order')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->paginate(paginationLimit());
        return view('livewire.admin.index.sliders',  [
            'slides' => $sliders,
        ]);
    }
}
