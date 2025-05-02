<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'client',
        'start_date',
        'end_date',
        'status'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $guarded = ['slug'];
}
