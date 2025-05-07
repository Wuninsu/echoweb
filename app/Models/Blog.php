<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'content',
        'image',
        'published_at',
        'status'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $guarded = ['slug'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // app/Models/Blog.php

    public function comments()
    {
        return $this->hasMany(PostComment::class)->whereNull('parent_id')->latest();
    }
}
