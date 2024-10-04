<?php

namespace App\Models;

use App\Enums\NewsletterSubscriberStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class NewsletterSubscriber extends Model
{
    use HasFactory, HasUuids, Notifiable;

    protected $fillable = [
        'email',
        'subscribed_at',
        'unsubscribed_at',
        'last_sent_at',
        'status'
    ];

    protected $casts = [
        'status' => NewsletterSubscriberStatusEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
