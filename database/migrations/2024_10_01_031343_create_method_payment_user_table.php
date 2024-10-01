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
        Schema::create('method_payment_user', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('method_payment_id')->constrained()->restrictOnDelete();
            $table->foreignUuid('user_id')->constrained()->restrictOnDelete();
            $table->string('name');
            $table->string('instructions');
            $table->string('type');
            $table->string('status');
            $table->string('payment_data')->nullable();
            $table->string('payment_data_extra')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('method_payment_users');
    }
};
