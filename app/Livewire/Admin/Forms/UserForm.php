<?php

namespace App\Livewire\Admin\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class UserForm extends Component
{
    use WithFileUploads;
    public $user_id;
    public $roles;

    public $username, $email, $name, $phone, $avatar, $status, $role, $password;
    public $password_confirmation;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|min:4|max:255|alpha_dash|unique:users,username,' . $this->user_id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user_id,
            'phone' => 'required|regex:/^\d{10,13}$/|unique:users,phone,' . $this->user_id,
            'role' => 'required|array',
            'role.*' => 'exists:roles,name',
            'status' => 'nullable|boolean',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'password' => $this->user_id ? 'nullable|confirmed|min:6' : 'required|confirmed|min:6',
        ];
    }

    public $showImg;

    public function mount(User $user)
    {
        $this->roles = Role::whereNotIn('name', ['student', 'parent'])->get();

        if ($user->uuid) {
            $uid = $user->uuid;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->username = $user->username;
            $this->status = $user->status == 1 ? true : false;
            $this->showImg = $user->avatar;
            $this->phone = $user->phone;
            $this->role = $user->getRoleNames();

            $this->user_id = $user->id;
        }
    }



    public function saveUser()
    {

        $validated =  $this->validate();

        $user = User::find($this->user_id);
        $filePath = $user ? $user->avatar : null;

        // Handle file upload if a new image is selected
        if ($this->avatar) {
            if ($filePath) {
                if (Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }
            }
            $filePath = uploadFile($this->avatar, 'avatars');
        }

        // Check if updating or creating
        if ($this->user_id) {
            // Update User
            $user = User::findOrFail($this->user_id);
            $user->update([
                'username' => $this->username,
                'email' => $this->email,
                'phone' => $this->phone,
                'name' => $this->name,
                'role' => $this->role,
                'avatar' => $filePath,
                'status' => $this->status,
            ]);

            // Update Password if Provided
            if ($this->password) {
                $user->update([
                    'password' => Hash::make($this->password),
                ]);
            }
        } else {
            // Create New User
            $user = User::create([
                'username' => $this->username,
                'email' => $this->email,
                'phone' => $this->phone,
                'name' => $this->name,
                'avatar' => $filePath,
                'status' => $this->status,
                'password' => Hash::make($this->password), // Required on creation
            ]);
        }

        // Sync role
        $user->syncRoles($validated['role']);
        sweetalert()->success($this->user_id ? 'User updated successfully' : 'User created successfully');

        $this->reset(); // Reset form
        return redirect()->route('users.index');
    }

    #[Title('Manage Users')]
    public function render()
    {
        return view('livewire.admin.forms.user-form');
    }
}
