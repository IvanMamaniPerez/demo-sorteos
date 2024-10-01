<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'customer_id',
        'seller_id',
        'total_price',
        'total_taxes',
        'total_discount',
        'total_amount',
        'currency_code',
        'status',
    ];

    protected $casts = [
        'status' => OrderStatusEnum::class,
    ];

    /**
     * Get the currency in the Order
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Currency>
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_code', 'code');
    }

    /**
     * Get the Seller that owns the Order
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    /**
     * Get the user that owns the Order
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
