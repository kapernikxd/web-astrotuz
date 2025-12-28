<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    protected $fillable = [
        'page_id',
        'meta_title',
        'meta_description',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
