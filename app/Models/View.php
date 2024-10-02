<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class View extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'viewable_id',
        'viewable_type',
        'ip',
        'user_agent',
        'country_code',
    ];

    /**
     * Get all of the owning viewable models.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function viewable() : MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the user that owns the View
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the country that owns the View
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Country>
     */
    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_code', 'code');
    }
}
