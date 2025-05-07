<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

// Route::middleware(['guest'])->group(function () {
Route::get('/', App\Livewire\Guest\Home::class)->name('home');
Route::get('/home', App\Livewire\Guest\Home::class)->name('home.redirect');

Route::get('/services', App\Livewire\Guest\Service::class)->name('service');
Route::get('/about', App\Livewire\Guest\About::class)->name('about');
Route::get('/contact', App\Livewire\Guest\Contact::class)->name('contact');
Route::get('/blogs', App\Livewire\Guest\Blog::class)->name('blog');
Route::get('/blogs/post/show/{post}', App\Livewire\Guest\ShowPost::class)->name('posts.show');



// Route::get('contact-message/reply/{messageId}', App\Livewire\Backend\MessageResponse::class)->name('contact.reply');
// Route::get('otp', App\Livewire\Auth\OtpForm::class)->name('otp');
// Route::get('forgot-password', ResetForm::class)->name('reset-password');
// });

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'role:admin|super-admin'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');


    Route::get('users', App\Livewire\Admin\Index\Users::class)->name('users.index');
    Route::get('our-services', App\Livewire\Admin\Index\Services::class)->name('services.index');

    Route::get('projects', App\Livewire\Admin\Index\Projects::class)->name('projects.index');
    Route::get('/projects/create', App\Livewire\Admin\Forms\ProjectForm::class)->name('projects.create')->middleware('permission:create projects');
    Route::get('/projects/edit/{project}', App\Livewire\Admin\Forms\ProjectForm::class)->name('projects.edit')->middleware('permission:edit projects');


    Route::get('roles', App\Livewire\Admin\Index\Roles::class)->name('roles.index');

    Route::get('/users/create', App\Livewire\Admin\Forms\UserForm::class)->name('users.create')->middleware('permission:create users');
    Route::get('/users/edit/{user}', App\Livewire\Admin\Forms\UserForm::class)->name('users.edit')->middleware('permission:edit users');

    Route::get('/roles', App\Livewire\Admin\Index\Roles::class)->name('roles.index')->middleware('permission:view roles');
    Route::get('/permissions', App\Livewire\Admin\Index\Permissions::class)->name('permissions.index')->middleware('permission:view permissions');

    Route::get('/roles/manage-permissions/{role}', App\Livewire\Admin\Forms\ManagePermissions::class)->name('roles.manage_permissions')->middleware('permission:view roles');


    Route::get('subscribers', App\Livewire\Admin\Index\Subscribers::class)->name('subscribers.index');

    Route::get('posts', App\Livewire\Admin\Index\Blogs::class)->name('posts.index');
    Route::get('/posts/create', App\Livewire\Admin\Forms\BlogForm::class)->name('posts.create')->middleware('permission:create posts');
    Route::get('/posts/edit/{post}', App\Livewire\Admin\Forms\BlogForm::class)->name('posts.edit')->middleware('permission:edit posts');

    Route::get('/testimonies', App\Livewire\Admin\Index\Testimonies::class)->name('testimonies.index');
    Route::get('/contact-messages', App\Livewire\Admin\Index\Messages::class)->name('messages.index');


    Route::get('/setups', App\Livewire\Admin\Index\Setups::class)->name('setups.index');
    Route::get('/setups/sliders', App\Livewire\Admin\Index\Sliders::class)->name('sliders.index');
});

require __DIR__ . '/auth.php';
