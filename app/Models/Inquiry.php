<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'service_type', 'message', 'read'
    ];

    protected $casts = [
        'read' => 'boolean',
    ];
}
