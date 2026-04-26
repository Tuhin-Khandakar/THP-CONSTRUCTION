<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'category', 'area_sqft', 'cost_range', 'status', 'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
