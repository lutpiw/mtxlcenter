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
        Schema::create('ziswaf_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('cost');
            $table->string('thumbnail');
            $table->string('transfer_code')->nullable();
            $table->boolean('is_open')->default(true);
            $table->date('close_at')->nullable();
            $table->text('about');
            $table->foreignId('ziswaf_program_id')->constrained()->noActionOnDelete();
            $table->foreignId('ziswaf_category_id')->constrained()->noActionOnDelete();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ziswaf_campaigns');
    }
};
