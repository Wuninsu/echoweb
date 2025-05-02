<?php

namespace App\Livewire\Admin\Index;

use App\Models\Setup;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Setups extends Component
{
    use WithFileUploads;
    public $settings = [];

    public function mount()
    {
        // Load the settings as an associative array
        $settingsData = Setup::all();
        foreach ($settingsData as $setting) {
            $this->settings[$setting->key] = $setting->value;
        }
    }

    public function updateData()
    {
        foreach ($this->settings as $key => $value) {
            // Find the setting by 'key' instead of 'id'
            $setting = Setup::where('key', $key)->first();

            if ($setting) {
                // Handle file uploads for logo and favicon
                if (($key == 'logo' || $key == 'favicon') && $this->settings[$key] instanceof TemporaryUploadedFile) {
                    $newFileName = $key . '_' . time() . '.' . $this->settings[$key]->extension();
                    $filePath = uploadFile($this->settings[$key], 'uploads', $newFileName);
                    $value = $filePath; // Set value to file path
                }

                // Update the settings table using 'key'
                Setup::where('key', $key)->update(['value' => $value]);
            }
        }


        sweetalert()->success('Settings updated successfully!');
    }



    #[Title('Setups')]
    public function render()
    {
        return view('livewire.admin.index.setups');
    }
}
