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
        Schema::create("products", function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', 10, 2);
            $table->integer('sale_price');
            $table->text('description');
            $table->boolean('reconditioned')->default(false);
            $table->foreignId('manufacturer_id')->constrained('manufacturer');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('subcategory_id')->constrained('subCategories');
            $table->foreignId('ram_id')->nullable()->constrained('ram_specs');
            $table->foreignId('armazenamento_id')->nullable()->constrained('storage_specs');
            $table->foreignId('cpu_id')->nullable()->constrained('processor_specs');
            $table->foreignId('motherboard_id')->nullable()->constrained('motherboard_specs');
            $table->foreignId('gpu_id')->nullable()->constrained('gpu_specs');
            $table->foreignId('powersupply_id')->nullable()->constrained('powersupply_specs');
            $table->foreignId('cpu_cooler_id')->nullable()->constrained('cpu_coolers_specs');
            $table->foreignId('pc_case_id')->nullable()->constrained('cases_specs');
            $table->boolean('included_cooler')->default(false);
            $table->boolean('bluetooth')->default(false);
            $table->boolean('wifi')->default(false);
            $table->integer('stock');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
