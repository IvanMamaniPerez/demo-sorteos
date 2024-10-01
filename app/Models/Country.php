<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'id',
        'name',
        'code',
        'timezone_default',
        'currency_default',
    ];

    /**
     * The timezones that belong to the country.
     * @return BelongsToMany<Timezone>
     */
    public function timezones()
    {
        return $this->belongsToMany(Timezone::class)->using(CountryTimezone::class);
    }

    /**
     * The currencies that belong to the country.
     * @return BelongsToMany<Currency>
     */
    public function currencies()
    {
        return $this->belongsToMany(Currency::class)->using(CountryCurrency::class);
    }
}
