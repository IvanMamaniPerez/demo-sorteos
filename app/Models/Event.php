<?php

namespace App\Models;


use App\Enums\EventStatusEnum;
use App\Enums\EventTypeParticipantEnum;
use App\Enums\FileTypeEnum;
use App\Enums\EventTypeExecuteEnum;
use App\Traits\CommentableModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use HasFactory, HasUuids, SoftDeletes, CommentableModelTrait;

    protected $fillable = [
        'name',
        'description',
        'published_at',
        'type_execute',
        'type_participant',
        'user_id',
        'guaranteed',
        'cost_ticket',
        'total_value_prizes',
        'currency_code',
        'start_at',
        'end_at',
        'executed_at',
        'canceled_at',
        'banner_id',
        'can_comment',
        'can_purchased',
        'show_quantity_tickets',
        'quantity_tickets',
        'status',
    ];

    protected $casts = [
        'type_execute'     => EventTypeExecuteEnum::class,
        'type_participant' => EventTypeParticipantEnum::class,
        'status'           => EventStatusEnum::class,
    ];

    /**
     * Get the user that owns the event.
     * @return BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     * Get the team that owns the event.
     * @return HasOne<File>
     */
    public function banner(): HasOne
    {
        return $this->hasOne(File::class, 'id', 'banner_id')
            ->where('type', FileTypeEnum::IMAGE);
    }

    /**
     * Get the images associated with the event.
     * @return MorphToMany<File>
     */
    public function images(): MorphToMany
    {
        return $this->morphToMany(File::class, 'fileable')
            ->where('type', FileTypeEnum::IMAGE);
    }

    /**
     * Get the files associated with the event.
     * @return MorphToMany<File>
     */
    public function files(): MorphToMany
    {
        return $this->morphToMany(File::class, 'fileable');
    }

    /**
     * Get the user that owns the event.
     * @return HasMany<Ticket>
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Get the prizes for the event.
     * @return BelongsToMany<Prize>
     */
    public function prizes(): BelongsToMany
    {
        return $this->belongsToMany(Prize::class)
            ->using(EventPrize::class);
    }

    /**
     * Get the documents associated with the event.
     * @return MorphToMany<File>
     */
    public function documents(): MorphToMany
    {
        return $this->morphToMany(File::class, 'fileable')
            ->where('type', FileTypeEnum::DOCUMENT);
    }

    /**
     * Get all of the favorites for the event.
     * @return MorphMany<Favorite>
     */
    public function favorites(): MorphMany
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }


    protected function start_at(): Attribute
    {
        // save as UTC timestamp
        return Attribute::make(
            set: fn($value) => Carbon::parse($value)->setTimezone('UTC')->toDateTimeString(),
        );
    }

    protected function end_at(): Attribute
    {
        // save as UTC timestamp
        return Attribute::make(
            set: fn($value) => Carbon::parse($value)->setTimezone('UTC')->toDateTimeString(),
        );
    }

    protected function executed_at(): Attribute
    {
        // save as UTC timestamp
        return Attribute::make(
            set: fn($value) => Carbon::parse($value)->setTimezone('UTC')->toDateTimeString(),
        );
    }

    protected function canceled_at(): Attribute
    {
        // save as UTC timestamp
        return Attribute::make(
            set: fn($value) => Carbon::parse($value)->setTimezone('UTC')->toDateTimeString(),
        );
    }

    protected function published_at(): Attribute
    {
        // save as UTC timestamp
        return Attribute::make(
            set: fn($value) => Carbon::parse($value)->setTimezone('UTC')->toDateTimeString(),
        );
    }

    /**
     * Get the total tickets for the event.
     * @return int
     */
    public function getTotalTicketsAttribute(): int
    {
        return $this->tickets()->where('status', 'active')->count();
    }

    /**
     * Get all users in the event.
     * @return Collection
     */
    public function getParticipantsAttribute(): Collection
    {
        return $this->tickets()
            ->join('users', 'tickets.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', DB::raw('COUNT(tickets.id) as tickets_count'))
            ->groupBy('users.id', 'users.name')  // Agrupamos por todas las columnas no agregadas
            ->get();
    }
}
