<?php

namespace App\Livewire\Admin\Index;

use App\Models\Service;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;
    public $search = ''; // Search term
    public $service_id;
    public $isEdit = false;
    public $title, $icon;
    public $description;
    public $sanitizedSearch;

    protected function rules()
    {
        return [
            'title' => 'required|min:4|max:255|unique:services,title,' . $this->service_id,
            'description' => 'nullable|string|min:20|max:2055',
            'icon' => 'nullable|string'
        ];
    }

    public function saveService()
    {
        $validatedData = $this->validate(); // validate user inputs 
        $save = Service::create($validatedData);
        if (!$save) {
            sweetalert()->error('Fail to create service. Please try again.'); // send error msg
        }
        sweetalert()->success('Service created successfully.'); // send success msg
        $this->reset(); // reset form fields

    }


    public function editService(Service $service)
    {
        $this->service_id = $service->id;
        $this->title = $service->title;
        $this->icon = $service->icon;
        $this->description = $service->description;
        $this->isEdit = true;
    }

    public function updatePermission()
    {
        $validatedData = $this->validate();
        $service = Service::find($this->service_id);
        if ($service) {
            $service->update($validatedData);
            $this->reset();
            sweetalert()->success('Service has been updated successfully...');
        } else {
            sweetalert()->error('Service not found.');
        }
    }


    public function confirmDelete($id)
    {
        $this->dispatch('confirm', id: $id);
    }

    #[On('delete')]
    public function handleDelete($id)
    {
        $service = Service::find($id);

        if ($service) {
            $service->delete();
            sweetalert()->success('The service has been deleted successfully..');
        } else {
            sweetalert()->error('Service not found.');
        }

        $this->reset();
    }



    #[Title('Services')]
    public function render()
    {
        // Fetch services based on the search term or paginate all services
        $this->sanitizedSearch = str_replace(["'", '"'], '', $this->search);
        $services = Service::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(7);
        return view('livewire.admin.index.services', ['services' => $services]);
    }
}
