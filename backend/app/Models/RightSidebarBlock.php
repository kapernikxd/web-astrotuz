<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RightSidebarBlock extends Model
{
    protected $fillable = [
        'title',
        'type',
        'content',
        'zodiac_items',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'zodiac_items' => 'array',
        'is_active' => 'boolean',
    ];
}
