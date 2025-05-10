<?php

namespace App\Livewire\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    public string $name = '';

    public string $email = '';
    public $avatar;
    public $phone;
    public $username;

    /**
     * Mount the component.
     */
    #[Title('Settings')]
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->username = Auth::user()->username;
        $this->phone = Auth::user()->phone;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => 'required|min:4|max:255|alpha_dash|unique:users,username,' . auth('web')->id(),
            'phone' => 'required|regex:/^\d{10,13}$/|unique:users,phone,' . auth('web')->id(),
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $filePath = $user ? $user->avatar : null;

        // Handle file upload if a new image is selected
        if ($this->avatar) {
            if ($filePath) {
                if (Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }
            }
            $user->avatar = uploadFile($this->avatar, 'avatars');
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}
