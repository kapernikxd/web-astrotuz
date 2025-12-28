<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PageSeo;

class Page extends Model
{
    //
    protected $fillable = [
        'slug',
        'template',
        'title',
        'content',
        'zodiac_blocks',
        'is_published',
    ];

    protected $casts = [
        'zodiac_blocks' => 'array',
    ];

    public function seo()
    {
        return $this->hasOne(PageSeo::class);
    }
}
