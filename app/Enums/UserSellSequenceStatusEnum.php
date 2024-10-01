<?php

namespace App\Enums;

enum UserSellSequenceStatusEnum : string
{
    //
    case DEFAULT = 'default';
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}
