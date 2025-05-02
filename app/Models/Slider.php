<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'button',
        'button_link',
        'image',
        'order',
        'is_active'
    ];
}
