<?php

namespace App\Livewire\Guest;

use App\Models\Blog;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Layout('components.layouts.guest')]
class ShowPost extends Component
{
    public $post;

    public $name;
    public $email;
    public $comment;
    public $parentId = null;

    public function mount(Blog $post)
    {
        $this->post = $post;
        $viewed = session()->get('viewed_posts', []);

        if (!in_array($post->id, $viewed)) {
            $post->increment('views');
            session()->push('viewed_posts', $post->id);
        }
        // Check if the user is authenticated
        if (Auth::check()) {
            $this->name = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|min:3',
        ];
    }

    public function submitComment()
    {
        // Validate the input
        $this->validate();

        // Check if the user is logged in
        if (!Auth::check()) {
            // Check if a user with a guest-like email already exists

            $guestUser = User::where('email', $this->email)->first();

            if (!$guestUser) {
                // If no user exists with this email, create a new guest user
                $guestRole = Role::findByName('guest');
                $guestUser = User::create([
                    'name' => $this->name, // You can modify this if you want to store a real name
                    'email' => $this->email, // Using the generated guest email
                    'password' => Hash::make('guestpassword'),
                ]);
                // Assign the 'guest' role to the guest user
                $guestUser->assignRole($guestRole);
            }
            # code... // Log the guest user in
            // Auth::login($guestUser);
            // Use the user ID of the found or newly created guest user
            $userId = $guestUser->id;
        } else {
            // If logged in, use the authenticated user's ID
            $userId = Auth::id();
        }

        // Create the comment with the user's ID and other data
        PostComment::create([
            'blog_id' => $this->post->id,
            'user_id' => $userId,
            'comment' => $this->comment,
            'parent_id' => $this->parentId,
        ]);

        // Reset the comment and parentId fields
        $this->reset(['comment', 'parentId', 'email', 'name']);

        // Show a success message
        session()->flash('message', 'Comment submitted successfully.');
    }


    public function setReply($commentId)
    {
        $this->parentId = $commentId;
        $this->dispatch('scroll-to-comment-form');
    }


    public function render()
    {
        seo()
            ->title($this->post->title . ' - ' . config('app.name', 'Echo Edge'))
            ->description(\Illuminate\Support\Str::limit(strip_tags($this->post->content), 150))
            ->keywords($this->post->title . ', Echo Edge blog, Digital solutions, Web Development')
            ->canonical(url()->current())
            ->twitterCard('summary_large_image')
            ->image(default: fn() => asset($this->post->image ?? 'header.png'))
            ->flipp('blog', 'o1vhcg5npgfu')
            ->twitterSite('@echoedgeds');

        $comments = $this->post->comments()->with('replies.user', 'user')->get();
        return view('livewire.guest.show-post', compact('comments'));
    }
}
