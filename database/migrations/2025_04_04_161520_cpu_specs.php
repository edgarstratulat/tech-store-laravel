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
            $table->string('model');
            $table->integer("cores");
            $table->integer("threads");
            $table->decimal("base_clock", 5,2);
            $table->decimal("boost_clock", 5,2);
            $table->integer('tdp');
            $table->string('socket');
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
