<?php

namespace App\Livewire\Admin\Index;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;
    public $search = '';
    public $role = '';
    public $user_uuid, $roles;
    public $showDelete = false;


    protected $queryString = [
        'search' => ['except' => ''],
        'role' => ['except' => ''],
    ];

    public function mount()
    {
        $roles = Role::whereNotIn('name', ['student', 'parent'])->get();
        $this->roles = $roles;
    }


    public function confirmDelete($uuid)
    {
        $this->dispatch('confirm', uuid: $uuid);
    }

    #[On('delete')]
    public function handleDelete($uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        if ($user) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $user->delete();
            sweetalert()->success('User deleted successfully.');
        } else {
            sweetalert()->error('User not found.');
        }
    }



    #[Title('Users')]
    public function render()
    {
        // Cache::put("user_phone", auth('web')->user()->phone, now()->addMinutes(2));

        $users = User::query()
            // ->whereDoesntHave('roles', function ($query) {
            //     $query->whereIn('name', ['super-admin']);
            // })
            ->when($this->role, function ($query) {
                $query->whereHas('roles', function ($q) {
                    $q->where('name', $this->role);
                });
            })
            ->when($this->search, function ($query) {
                $query->where('username', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.index.users', [
            'users' => $users
        ]);
    }
}
