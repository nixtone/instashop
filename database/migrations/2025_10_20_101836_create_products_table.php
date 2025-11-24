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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('short_name')->unique()->nullable();
            $table->integer('sort')->default(0);
            $table->boolean('active')->default(true);
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();

            $table->decimal('price', 8, 2)->default(0);
            $table->decimal('discount_percentage', 8, 2)->default(0);
            $table->decimal('discount_price', 8, 2)->default(0);

            $table->string('code')->unique()->nullable();
            $table->integer('stock')->default(1);
            $table->text('description')->nullable();
            $table->string('external_link')->nullable();

            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
