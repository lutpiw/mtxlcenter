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
        Schema::create('ziswaf_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Hamba Allah');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('notes')->nullable();
            $table->string('transaction_id');
            $table->timestamp('transaction_date');
            $table->unsignedBigInteger('amount');
            $table->string('payment_method');
            $table->boolean('is_paid');
            $table->string('proof');
            $table->foreignId('ziswaf_campaign_id')->constrained()->noActionOnDelete();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ziswaf_transactions');
    }
};
