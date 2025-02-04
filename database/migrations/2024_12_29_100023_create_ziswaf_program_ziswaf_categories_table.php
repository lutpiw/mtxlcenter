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
        Schema::create('ziswaf_program_ziswaf_category', function (Blueprint $table) {
            $table->foreignId('ziswaf_program_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ziswaf_category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ziswaf_program_ziswaf_categories');
    }
};
