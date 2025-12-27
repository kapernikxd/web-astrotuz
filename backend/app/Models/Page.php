<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $fillable = [
        'slug',
        'template',
        'title',
        'meta_title',
        'meta_description',
        'content',
        'is_published',
    ];
}
