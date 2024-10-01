<?php

namespace App\Enums;

enum TransactionTypeEnum : string
{
    case REFOUND  = 'refound';
    case PURCHASE = 'purchase';
    case SALE     = 'sale';
}
