<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Timezone extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'id',
        'name',
        'utc_offset',
    ];

    /**
     * The countries that belong to the timezone.
     * @return BelongsToMany<Country>
     */
    public function countries() : BelongsToMany
    {
        return $this->belongsToMany(Country::class)->using(CountryTimezone::class);
    }
}
