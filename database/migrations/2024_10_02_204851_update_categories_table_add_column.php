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
        Schema::table('resources', function (Blueprint $table) {
            // Adding new columns
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');  // New status column

            // Adding indexes
            $table->index('category_id');
            $table->index('slug');
            $table->index('type');
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resources', function (Blueprint $table) {
            // Dropping the added columns
            $table->dropColumn('status');

            // Dropping the added indexes
            $table->dropIndex(['category_id']);
            $table->dropIndex(['slug']);
            $table->dropIndex(['type']);
            $table->dropIndex(['published_at']);
        });
    }
};
