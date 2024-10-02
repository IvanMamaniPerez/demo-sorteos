<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carteable extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'cart_id',
        'carteable_id',
        'carteable_type',
        'description',
        'price',
        'discount',
        'amount',
        'quantity',
        'currency_code',
    ];

    /**
     * Get the cart that owns the Carteable
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Cart>
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get all of the owning carteable models.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function carteable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the currency that owns the Carteable
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Currency>
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_code', 'code');
    }
}
