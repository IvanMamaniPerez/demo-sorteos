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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('customer_id')->constrained('users');
            $table->foreignUuid('seller_id')->constrained('users');
            $table->decimal('total_price', 20, 4);
            $table->decimal('total_taxes', 20, 4);
            $table->decimal('total_discount', 20, 4);
            $table->decimal('total_amount', 20, 4);
            $table->string('currency_code');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
