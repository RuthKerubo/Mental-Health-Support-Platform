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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key for category
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->enum('type', ['article', 'helpline', 'support_group']);
            $table->date('published_at')->nullable();  // For filtering by year
            $table->unsignedInteger('relevance_score')->default(0);  // For relevance sorting
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
