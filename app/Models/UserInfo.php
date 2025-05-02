<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'user_id',
        'position',
        'bio',
        'facebook_link',
        'x_link',
        'github_link',
        'linkedin_link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
