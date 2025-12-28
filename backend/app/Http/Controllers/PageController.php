<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function show(string $slug)
    {
        $page = Page::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $template = $page->template ?: 'main';
        $templateView = match ($template) {
            'blank' => 'pages.templates.blank',
            'main' => 'pages.templates.main',
            'zodiac_builder' => 'pages.templates.zodiac-builder',
            default => 'pages.templates.main',
        };

        return view($templateView, compact('page'));
    }
}
