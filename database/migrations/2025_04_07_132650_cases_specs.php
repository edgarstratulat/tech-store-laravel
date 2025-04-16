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
        Schema::create('cases_specs', function (Blueprint $table){
            $table->id();
            $table->string('format')->nullable();
            $table->json('motherboard_supported')->nullable();
            $table->integer('number_front_fans')->nullable();
            $table->integer('number_lower_fans')->nullable();
            $table->integer('number_upper_fans')->nullable();
            $table->integer('number_rear_fans')->nullable();
            $table->integer('max_gpu_length')->nullable();
            $table->integer('max_cooler_height')->nullable();
            $table->boolean('tempered_glass')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases_specs');
    }
};
