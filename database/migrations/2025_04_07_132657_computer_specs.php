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
            $table->foreignId('processor')->constrained('processor_specs');
            $table->foreignId('motherboard')->constrained('motherboard_specs');
            $table->foreignId('ram')->constrained('ram_specs');
            $table->foreignId('storage')->constrained('storage_specs');
            $table->foreignId('gpu')->nullable()->constrained('gpu_specs');
            $table->foreignId('case')->constrained('cases_specs');
            $table->foreignId('powersupply')->constrained('powersupply_specs');
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
