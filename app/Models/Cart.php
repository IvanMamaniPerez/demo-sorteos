<?php

namespace App\Models;

use App\Enums\CartActivityEnum;
use App\Enums\CartStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'user_id',
        'total_price',
        'total_discount',
        'total_amount',
        'currency_code',
        'last_activity',
        'last_activity_at',
        'status',
    ];

    protected $casts = [
        'active'        => CartStatusEnum::class,
        'last_activity' => CartActivityEnum::class,
    ];

    /**
     * Get the user that owns the Cart
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the cart's carteables.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Carteable>
     */
    public function carteables(): HasMany
    {
        return $this->hasMany(Carteable::class);
    }

}
