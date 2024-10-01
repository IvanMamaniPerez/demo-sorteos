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
        Schema::create('event_prize', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedInteger('position');
            $table->foreignUuid('event_id')->constrained()->restrictOnDelete();
            $table->foreignUuid('prize_id')->constrained()->restrictOnDelete();
            $table->foreignUuid('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignUuid('ticket_id')->nullable()->constrained()->nullOnDelete();
            $table->string('status');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_prize');
    }
};
