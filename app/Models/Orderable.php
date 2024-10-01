<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Orderable extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'orderable_id',
        'orderable_type',
        'quantity',
        'price',
        'taxes',
        'discount',
        'amount',
        'status',
    ];

    /**
     * Get the order that owns the Orderable
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Order>
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the orderable that owns the Orderable
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo<Orderable>
     */
    public function orderable(): MorphTo
    {
        return $this->morphTo();
    }
}
