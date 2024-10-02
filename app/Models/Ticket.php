<?php

namespace App\Models;

use App\Enums\TicketStatusEnum;
use App\Traits\LoggableModelTrait;
use App\Traits\ViewableModelTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory, HasUuids, LoggableModelTrait, ViewableModelTrait;

    protected $fillable = [
        'id',
        'event_id',
        'number',
        'user_id',
        'status',
        'purchased_at',
    ];

    protected $casts = [
        'status' => TicketStatusEnum::class,
    ];

    /**
     * Get the event that owns the ticket.
     * @return BelongsTo<Event>
     */
    public function event() : BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the user that owns the ticket.
     * @return BelongsTo<User>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prizes()
    {
        return $this->belongsToMany(Prize::class, 'event_prizes', 'ticket_id', 'prize_id')
            ->withPivot('position', 'status', 'quantity')
            ->orderBy('position')
            ->using(EventPrize::class);
    }

}
