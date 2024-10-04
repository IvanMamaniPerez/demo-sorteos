<?php

namespace App\Models;

use App\Traits\LoggableModelTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory, HasUuids, LoggableModelTrait;

    protected $fillable = [
        'user_id',
        'description',
        'timezone_current',
        'country_current',
        'currency_current',
        'locale',
        'credits',
        'whatsapp',
    ];

    /**
     * Get the user that owns the Profile
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the currency that owns the Profile
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Currency>
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_current');
    }

    /**
     * Get the country that owns the Profile
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Country>
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_current');
    }

    
}
