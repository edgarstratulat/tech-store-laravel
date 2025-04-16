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
        Schema::create('computer_specs', function (Blueprint $table){
            $table->id();
            $table->foreignId('processor')->nullable()->constrained('processor_specs');
            $table->foreignId('motherboard')->nullable()->constrained('motherboard_specs');
            $table->foreignId('ram')->nullable()->constrained('ram_specs');
            $table->foreignId('storage')->nullable()->constrained('storage_specs');
            $table->foreignId('gpu')->nullable()->nullable()->constrained('gpu_specs');
            $table->foreignId('case')->nullable()->constrained('cases_specs');
            $table->foreignId('powersupply')->nullable()->constrained('powersupply_specs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer_specs');
    }
};
