<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'excerpt', 'meta_title', 'meta_description', 'featured_image', 'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
