<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('description');
            $table->string('file_path')->nullable()->after('image_path');
            $table->string('external_link')->nullable()->after('file_path');
        });
    }

    public function down()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->dropColumn(['image_path', 'file_path', 'external_link']);
        });
    }
};