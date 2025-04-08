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
        Schema::create('cpu_coolers_specs', function (Blueprint $table){
            $table->id();
            $table->string('socket');
            $table->string('type');
            $table->integer('fan_rpm');
            $table->float('air_flow');
            $table->boolean('rgb')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpu_coolers_specs');
    }
};
