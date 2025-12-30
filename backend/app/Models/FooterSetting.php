<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $fillable = [
        'title',
        'description',
        'primary_links',
        'secondary_links',
        'social_links',
        'copyright_line',
        'is_active',
    ];

    protected $casts = [
        'primary_links' => 'array',
        'secondary_links' => 'array',
        'social_links' => 'array',
        'is_active' => 'boolean',
    ];
}
