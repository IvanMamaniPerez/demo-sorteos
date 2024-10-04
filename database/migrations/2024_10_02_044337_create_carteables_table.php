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
        Schema::create('carteables', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('cart_id')->constrained()->cascadeOnDelete();
            $table->uuidMorphs('carteable');
            $table->string('description');
            $table->decimal('price', 20, 4);
            $table->decimal('discount', 20, 4);
            $table->decimal('amount', 20, 4);
            $table->unsignedInteger('quantity');
            $table->string('currency_code');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carteables');
    }
};
