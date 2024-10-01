<?php

namespace App\Enums;

enum MethodPaymentStatusEnum: string
{
    case ACTIVE = 'active';
    case DISABLED = 'disabled';
}
