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
        Schema::create('keyboard_specs', function (Blueprint $table) {
            $table->id();
            $table->string('format')->nullable();
            $table->string('type')->nullable();
            $table->boolean('light')->default(false);
            $table->boolean('numpad')->default(false);
            $table->string('switch')->nullable();
            $table->integer('response_time')->nullable();
            $table->string('layout')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keyboard_specs');
    }
};
