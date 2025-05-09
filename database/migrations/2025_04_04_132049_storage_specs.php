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
        Schema::create("storage_specs", function (Blueprint $table) {
            $table->id();
            $table->integer("size");
            $table->string('type')->nullable();
            $table->integer('rotation_speed')->nullable();
            $table->integer("writing_speed")->nullable();
            $table->integer("reading_speed")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storage_specs');
    }
};
