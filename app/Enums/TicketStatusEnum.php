<?php

namespace App\Enums;

enum TicketStatusEnum: string
{
    case PURCHARSED = 'purcharsed';
    case IN_CART    = 'in_cart';
    case RESERVED   = 'reserved';
    case ANULED     = 'anuled';
}
