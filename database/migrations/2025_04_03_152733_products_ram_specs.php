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
        Schema::create("ram_specs", function (Blueprint $table) {
            $table->id();
            $table->integer("size")->nullable();
            $table->string('type')->nullable();
            $table->integer("frequency")->nullable();
            $table->integer("latency")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ram_specs');
    }
};
