<?php

namespace App\Enums;

enum MethodPaymentTypeEnum: string
{
    case CASH     = 'cash';
    case BANKED   = 'banked';
    case E_WALLET = 'e_wallet';
}
