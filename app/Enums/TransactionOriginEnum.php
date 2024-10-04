<?php

namespace App\Enums;

enum TransactionOriginEnum: string
{
    case MANUAL    = 'manual';
    case AUTOMATIC = 'automatic';
    case SYSTEM    = 'system';
    case EXTERNAL  = 'external';
    case INTERNAL  = 'internal';
}
