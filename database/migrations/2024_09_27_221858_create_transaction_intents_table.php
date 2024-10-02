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
        Schema::create('transaction_intents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('sender_id')->constrained();
            $table->foreignUuid('recipient_id')->constrained();
            $table->foreignUuid('method_payment_id')->constrained();
            $table->uuidMorphs('transactionable');
            $table->string('reason');
            $table->string('type');
            $table->string('status');
            $table->decimal('amount', 20, 4);
            $table->string('currency_code');
            $table->timestamps();
            // NOTE: Add procesor transaction can be manual, stripe, paypal, etc.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_intents');
    }
};
