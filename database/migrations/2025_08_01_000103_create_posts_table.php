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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->foreignId('author_id')->nullable()->constrained()->onDelete('set null'); // Optional: to store the author's name
            $table->string('slug')->unique(); // For SEO-friendly URLs
            $table->string('image_cover')->nullable(); // Optional: to store the post's image
            $table->boolean('is_published')->default(true); // To indicate if the post is published
            $table->timestamp('published_at')->nullable(); // To store the publication date
            $table->integer('views')->default(0);    // To track the number of views
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null'); // Optional: to link to a category
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
