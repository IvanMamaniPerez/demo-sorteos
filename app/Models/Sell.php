<?php

namespace App\Models;

use App\Enums\SellStatusEnum;
use App\Enums\SellTypeDocumentEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Sell extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'order_id',
        'user_id',
        'series',
        'sequence',
        'type_document',
        'status',
    ];

    protected $casts = [
        'type_document' => SellTypeDocumentEnum::class,
        'status'        => SellStatusEnum::class,
    ];

    /**
     * Get the order that owns the Sell
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Order>
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get all of the transactions for the Sell
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany<Transaction>
     */
    public function transactions(): MorphMany
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}
