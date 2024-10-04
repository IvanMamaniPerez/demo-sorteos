<?php

namespace App\Enums;

enum TransactionStatusEnum: string
{
    case SUCCESS   = 'success';
    case REFOUNDED = 'refounded';
    case REPORTED  = 'reported';
}
