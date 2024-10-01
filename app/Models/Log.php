<?php

namespace App\Models;

use App\Enums\LogActionEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'action',
        'ip',
        'user_agent',
        'action',
        'before',
        'after',
        'loggable_id',
        'loggable_type',
    ];

    protected $casts = [
        'action' => LogActionEnum::class,
    ];

    /**
     * Get all of the owning loggable models.
     */
    public function loggable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user that owns the Log
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
