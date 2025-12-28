<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_seos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')
                ->constrained('pages')
                ->cascadeOnDelete();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();

            $table->unique('page_id');
        });

        if (Schema::hasColumns('pages', ['meta_title', 'meta_description'])) {
            $pages = DB::table('pages')
                ->select('id', 'meta_title', 'meta_description')
                ->where(function ($query) {
                    $query->whereNotNull('meta_title')
                        ->orWhereNotNull('meta_description');
                })
                ->get();

            if ($pages->isNotEmpty()) {
                $now = now();
                $payload = $pages->map(function ($page) use ($now) {
                    return [
                        'page_id' => $page->id,
                        'meta_title' => $page->meta_title,
                        'meta_description' => $page->meta_description,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                })->all();

                DB::table('page_seos')->insert($payload);
            }

            Schema::table('pages', function (Blueprint $table) {
                $table->dropColumn(['meta_title', 'meta_description']);
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumns('pages', ['meta_title', 'meta_description'])) {
            Schema::table('pages', function (Blueprint $table) {
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
            });
        }

        if (Schema::hasTable('page_seos')) {
            $records = DB::table('page_seos')
                ->select('page_id', 'meta_title', 'meta_description')
                ->get();

            foreach ($records as $record) {
                DB::table('pages')
                    ->where('id', $record->page_id)
                    ->update([
                        'meta_title' => $record->meta_title,
                        'meta_description' => $record->meta_description,
                    ]);
            }
        }

        Schema::dropIfExists('page_seos');
    }
};
