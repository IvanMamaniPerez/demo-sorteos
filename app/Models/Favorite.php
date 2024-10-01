<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'favoriteable_id',
        'favoriteable_type',
    ];

    /**
     * Get the user that owns the Favorite
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the favoriteable that owns the Favorite
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Favoriteable>
     */
    public function favoriteable(): BelongsTo
    {
        return $this->morphTo();
    }
}
