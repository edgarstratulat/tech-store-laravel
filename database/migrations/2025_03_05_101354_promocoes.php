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
        Schema::create('Computadores', function (Blueprint $table) {
            $table->id()->incrementing();
            $table->string('name');
            $table->string('price');
            $table->string('sale_price');
            $table->text('desc');
            $table->text('category');
            $table->text('subCategory');
            $table->string('image_path')->nullable();
            $table->string('stock');
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
