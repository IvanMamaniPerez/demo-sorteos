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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->timestamp('published_at')->nullable();
            $table->string('type_execute');
            $table->string('type_participant');
            $table->foreignUuid('user_id')->constrained()->restrictOnDelete();
            $table->boolean('guaranteed');
            $table->decimal('cost_ticket', 20, 4);
            $table->decimal('total_value_prizes', 20, 4);
            $table->decimal('currency_code', 20, 4);
            $table->timestamp('start_at');
            $table->timestamp('end_at');
            $table->timestamp('executed_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->foreignUuid('banner_id')->constraint('files')->restrictOnDelete();
            $table->boolean('can_comment');
            $table->boolean('can_purchased');
            $table->boolean('show_quantity_tickets');
            $table->unsignedBigInteger('quantity_tickets');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
