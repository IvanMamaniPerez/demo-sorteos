<?php

namespace App\Models;

use App\Enums\TransactionReasonEnum;
use App\Enums\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
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
    ];
}
