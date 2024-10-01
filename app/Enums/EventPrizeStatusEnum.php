<?php

namespace App\Enums;

enum EventPrizeStatusEnum: string
{
    case PENDING   = 'pending';
    case EXECUTED  = 'executed';
    case CANCELED  = 'canceled';
    case REJECTED  = 'rejected';
    case DELIVERED = 'delivered';
    case RECEIVED  = 'received';
}
