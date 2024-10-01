<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'rater_id',
        'ratee_id',
        'rating',
    ];

    /**
     * Get the rater that owns the Rating
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function rater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rater_id');
    }

    /**
     * Get the ratee that owns the Rating
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function ratee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ratee_id');
    }
}
