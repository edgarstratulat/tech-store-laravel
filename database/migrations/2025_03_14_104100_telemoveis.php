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
        Schema::create('Telemoveis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promocao_id')->nullable();
            $table->foreign('promocao_id')->references('id')->on('Promocoes')->nullOnDelete('Promocoes');
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
        Schema::dropIfExists('Telemoveis');
    }
};
