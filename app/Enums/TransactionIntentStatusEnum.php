<?php

namespace App\Enums;

enum TransactionIntentStatusEnum : string
{
    //
    case PENDING   = 'pending';
    case CONFIRMED  = 'accepted';
    case REJECTED  = 'rejected';
    case CANCELLED = 'cancelled';
    case REPORTED  = 'reported';
}
