<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeSpecificFieldsToResourcesTable extends Migration
{
    public function up()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->string('contact_number')->nullable();
            $table->string('support_group_link')->nullable();
            $table->string('availability')->nullable();
        });
    }

    public function down()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->dropColumn(['type', 'contact_number', 'support_group_link', 'availability']);
        });
    }
}