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
        Schema::create('orderables', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('order_id')->constrained()->cascadeOnDelete();
            $table->uuidMorphs('orderable');
            $table->decimal('quantity', 20, 4);
            $table->decimal('price', 20, 4);
            $table->decimal('taxes', 20, 4);
            $table->decimal('discount', 20, 4);
            $table->decimal('amount', 20, 4);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderables');
    }
};
