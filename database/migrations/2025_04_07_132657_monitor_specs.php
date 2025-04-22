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
        Schema::create('monitor_specs', function (Blueprint $table){
            $table->id();
            $table->boolean('inclination')->default(false);
            $table->string('format')->nullable();
            $table->string('ratio')->nullable();
            $table->string('resolution')->nullable();
            $table->float('inches')->nullable();
            $table->integer('refresh_rate')->nullable();
            $table->integer('response_time')->nullable();
            $table->string('type_panel')->nullable();
            $table->timestamps();          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitor_specs');
    }
};
