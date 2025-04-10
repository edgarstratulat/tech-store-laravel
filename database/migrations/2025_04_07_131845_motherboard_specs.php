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
            $table->string('format');
            $table->string('chipset');
            $table->string('cpu_socket');
            $table->string('ram_support');
            $table->integer('max_ram');
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
