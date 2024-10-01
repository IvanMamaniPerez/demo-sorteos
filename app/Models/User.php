<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserTypeRegisterEnum;
use App\Traits\LoggableModelTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use HasUuids;
    use LoggableModelTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type_register',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'type_register'     => UserTypeRegisterEnum::class,
        ];
    }

    /**
     * Get the comments for the blog post.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Comment>
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the profile associated with the user.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Profile>
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get the favorites for the user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Event>
     */
    public function events_won(): BelongsToMany
    {
        return $this->belongsToMany(
            Event::class,
            'event_prizes',
            'user_id',
            'event_id'
        )
            ->using(EventPrize::class);
    }

    /**
     * Get the transactions for the user.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Transaction>
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get the tickets for the user.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Ticket>
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Get the orders for the user as customer.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Order>
     */
    public function orders_as_customer(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    /**
     * Get the orders for the user as Seller.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Order>
     */
    public function orders_as_seller(): HasMany
    {
        return $this->hasMany(Order::class, 'seller_id');
    }


    /**
     * Get the sells for the user.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Sell>
     */
    public function sells(): HasMany
    {
        return $this->hasMany(Sell::class);
    }
}
