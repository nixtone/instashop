<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('Название');
            $table->string('slug')->unique()->comment('Транслит');
            $table->string('short_name')->unique()->nullable()->comment('Короткое название');
            $table->integer('sort')->nullable()->default(0)->comment('Сортировка');
            $table->boolean('active')->default(true)->comment('Активность');
            $table->foreignId('parent_id')->nullable()->constrained('categories')->cascadeOnDelete()->comment('Родительская категория');
            $table->string('external_link')->nullable()->comment('Ссылка для парсинга');

            $table->string('seo_title')->nullable()->comment('');
            $table->string('seo_description')->nullable()->comment('');
            $table->string('seo_keywords')->nullable()->comment('');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
