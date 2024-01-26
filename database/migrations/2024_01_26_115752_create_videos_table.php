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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('channel_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('uuid');
            $table->text('path')->nullable();
            $table->string('processed_file')->nullable();
            $table->enum('visibility', ['private','public','unlisted'])->default('private');
            $table->boolean('processed')->default(false);
            $table->boolean('allow_likes')->default(false);
            $table->boolean('allow_comments')->default(false);
            $table->string('processing_percentage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
