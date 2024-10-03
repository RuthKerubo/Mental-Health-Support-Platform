<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resource_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->text('comment')->nullable();
            $table->integer('rating')->nullable();
            $table->enum('emotional_state', [
                'very_positive',
                'positive',
                'neutral',
                'negative',
                'very_negative'
            ])->nullable();
            $table->boolean('found_helpful')->default(true);
            $table->boolean('is_anonymous')->default(true);
            $table->boolean('needs_follow_up')->default(false);
            $table->string('contact_email')->nullable();
            $table->enum('preferred_contact_method', ['email', 'phone'])->nullable();
            $table->string('contact_details')->nullable();
            $table->json('attachments')->nullable(); // Store array of file paths
            $table->boolean('is_archived')->default(false);
            $table->timestamp('followed_up_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};