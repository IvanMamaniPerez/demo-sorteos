<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Follower extends Model
{
    //
    protected $fillable = [
        'follower_id',
        'followee_id',
    ];

    /**
     * Get the follower that owns the Follower
     * @return BelongsTo<User>
     */
    public function follower(): BelongsTo
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    /** 
     * Get the followee that owns the Follower
     * @return BelongsTo<User>
     */
    public function followee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'followee_id');
    }
}
