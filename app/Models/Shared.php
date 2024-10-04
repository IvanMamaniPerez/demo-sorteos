<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shared extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'sharedable_id',
        'sharedable_type',
    ];

    /**
     * Get the user that owns the Shared
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the owning sharedable models.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function sharedable()
    {
        return $this->morphTo();
    }
}
