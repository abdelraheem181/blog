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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_no')->nullable();
            $table->text('bio')->nullable(); // Optional: to store a short biography of the author
            $table->string('profile_picture')->nullable(); // Optional: to store the author's profile picture
            $table->string('website')->nullable(); // Optional: to store the author's personal website
            $table->string('social_links')->nullable(); // Optional: to store social media links

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
