<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            // URL
            $table->string('slug')->unique();

            // Тип шаблона (seo-default, seo-sign, seo-article и т.д.)
            $table->string('template')->default('default');

            // Контент
            $table->string('title');                 // H1
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->longText('content')->nullable(); // SEO текст

            // Публикация
            $table->boolean('is_published')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
