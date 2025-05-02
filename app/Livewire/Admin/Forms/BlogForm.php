<?php

namespace App\Livewire\Admin\Forms;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogForm extends Component
{
    use WithFileUploads;

    public $author_id;
    public $title;
    public $slug;
    public $content;
    public $image;
    public $published_at;
    public $status = 0;
    public $post_id;
    public $showImg;

    public function mount(Blog $post)
    {
        if ($post) {
            $this->title = $post->title;
            $this->content = $post->content;
            $this->status = $post->status;
            $this->showImg = $post->image;
            // $this->description = $post->description;
            $this->slug = $post->slug;
            $this->post_id = $post->id;
        }
    }

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value . '-' . rand(100000, 999999));
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string',
            'slug' => [
                'required',
                'string',
                Rule::unique('blogs', 'slug')->ignore($this->post_id),
            ],
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable|in:draft,published'
        ]);

        $post = Blog::find($this->post_id);
        $filePath = $post ? $post->image : null;

        // Handle file upload if a new image is selected
        if ($this->image) {
            if ($filePath) {
                if (Storage::disk('public')->exists($post->image)) {
                    Storage::disk('public')->delete($post->image);
                }
            }
            $filePath = uploadFile($this->image, 'posts');
        }

        Blog::updateOrCreate(
            [
                'id' => $this->post_id
            ],
            [
                'author_id' => auth('web')->id(),
                'title' => $this->title,
                'slug' => $this->slug,
                'content' => $this->content,
                'image' => $filePath,
                'published_at' => $this->published_at ?? Carbon::now(),
                'status' => $this->status,
            ]
        );

        sweetalert()->success($this->post_id ? 'Blog post created successfully.' : 'Blog post updated successfully');
        $this->reset();

        return redirect(route('posts.index'));
    }

    #[Title('Manage Posts')]
    public function render()
    {
        return view('livewire.admin.forms.blog-form');
    }
}
