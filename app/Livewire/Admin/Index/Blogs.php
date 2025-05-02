<?php

namespace App\Livewire\Admin\Index;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
    ];


    public function confirmDelete($id)
    {
        $this->dispatch('confirm', id: $id);
    }

    #[On('delete')]
    public function handleDelete($id)
    {
        $post = Blog::findOrFail($id);
        if ($post) {
            // Unlink image before deleting
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $post->delete();
            sweetalert()->success('Blog post deleted successfully.');
        } else {
            sweetalert()->error('Blog post not found.');
        }

        $this->reset();
    }

    #[Title('Blog Posts')]
    public function render()
    {
        $blogs = Blog::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->paginate(paginationLimit());

        return view('livewire.admin.index.blogs', [
            'blogs' => $blogs
        ]);
    }
}
