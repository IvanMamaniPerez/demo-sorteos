<?php

namespace App\Models;

use App\Traits\LoggableModelTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MethodPaymentUser extends Pivot
{
    use HasFactory, HasUuids, LoggableModelTrait;

    protected $fillable = [
        'method_payment_id',
        'user_id',
        'instructions',
        'type',
        'status',
        'payment_data',
        'payment_data_extra',
    ];
}


