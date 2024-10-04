<?php

namespace App\Models;

use App\Enums\TransactionIntentStatusEnum;
use App\Enums\TransactionReasonEnum;
use App\Enums\TransactionTypeEnum;
use App\Traits\LoggableModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class TransactionIntent extends Model
{
    use HasFactory, LoggableModelTrait;

    protected $fillable = [
        'id',
        'sender_id',
        'recipient_id',
        'transactionable_id',
        'transactionable_type',
        'reason',
        'type',
        'status',
        'amount',
        'currency_code',
    ];

    protected $casts = [
        'reason' => TransactionReasonEnum::class,
        'type'   => TransactionTypeEnum::class,
        'status' => TransactionIntentStatusEnum::class,
    ];

    /**
     * Get the user that owns the Transaction
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_code', 'code');
    }

    /**
     * Get all of the owning transactionable models.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function transactionable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the user that send the Transaction
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Get the user that receive the Transaction
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    /**
     * Get the evidence
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany<File>
     */
    public function evidence(): MorphToMany
    {
        return $this->morphToMany(File::class, 'fileable');
    }


}
