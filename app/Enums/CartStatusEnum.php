<?php

namespace App\Enums;

enum CartStatusEnum : string
{
    case RECENTLY_CREATED = 'recently_created';
    case ACTIVE   = 'active';
    case CHECKOUT  = 'checkout';
    case ABANDONED = 'abandoned';
}
