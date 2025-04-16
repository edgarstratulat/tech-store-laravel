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
            $table->string('model')->nullable();
            $table->integer('ram')->nullable();
            $table->integer('storage')->nullable();
            $table->string('family_processor')->nullable();
            $table->string('processor')->nullable();
            $table->string('SIM')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('screen_resolution')->nullable();
            $table->float('screen_inches')->nullable();
            $table->integer('screen_hz')->nullable();
            $table->string('screen_type')->nullable();
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
