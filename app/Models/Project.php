<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'client',
        'start_date',
        'end_date',
        'status',
        'service_id',
        'featured',
        'url',
        'technologies',
        'is_visible',
        'created_by',
        'updated_by',
    ];

    // protected $casts = [
    //     'technologies' => 'array',
    //     'start_date' => 'date',
    //     'end_date' => 'date',
    //     'featured' => 'boolean',
    //     'is_visible' => 'boolean',
    // ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $guarded = ['slug'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
