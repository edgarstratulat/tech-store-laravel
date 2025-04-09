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
        Schema::create('smartphone_specs', function(Blueprint $table){
            $table->id();
            $table->string('model');
            $table->integer('ram');
            $table->integer('storage');
            $table->string('family_processor');
            $table->string('processor');
            $table->string('SIM');
            $table->string('operating_system');
            $table->string('screen_resolution');
            $table->float('screen_inches');
            $table->integer('screen_hz');
            $table->string('screen_type');
            $table->boolean('5G')->default(false);
            $table->boolean('NFC')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smartphone_specs');
    }
};
