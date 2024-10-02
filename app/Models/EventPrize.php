<?php

namespace App\Models;

use App\Enums\EventPrizeStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventPrize extends Pivot
{
    use HasUuids;

    protected $fillable = [
        'position',
        'event_id',
        'prize_id',
        'user_id',
        'ticket_id',
        'status',
        'quantity',
    ];

    protected $casts = [
        'status'   => EventPrizeStatusEnum::class,
        'quantity' => 'integer',
    ];

    /**
     * Get the event that owns the event prize.
     * @return BelongsTo<Event>
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the prize that owns the event prize.
     * @return BelongsTo<Prize>
     */
    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }


    /**
     * Get the user that owns the event prize.
     * @return BelongsTo<User>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the ticket that owns the event prize.
     * @return BelongsTo<Ticket>
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
