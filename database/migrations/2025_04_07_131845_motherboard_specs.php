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
        Schema::create('motherboard_specs', function (Blueprint $table){
            $table->id();
            $table->string('format')->nullable();
            $table->string('chipset')->nullable();
            $table->string('cpu_socket')->nullable();
            $table->string('ram_support')->nullable();
            $table->integer('max_ram')->nullable();
            $table->boolean('wifi')->default(false);
            $table->boolean('bluetooth')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motherboard_specs');
    }
};
