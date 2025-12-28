<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeftSidebarCard extends Model
{
    protected $fillable = [
        'title',
        'description',
        'cta_label',
        'url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
