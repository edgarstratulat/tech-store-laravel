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
        Schema::create("processor_specs", function (Blueprint $table) {
            $table->id();
            $table->string('model')->nullable();
            $table->integer("cores")->nullable();
            $table->integer("threads")->nullable();
            $table->integer('tdp')->nullable();
            $table->string('socket')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
