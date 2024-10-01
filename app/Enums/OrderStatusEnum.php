<?php

namespace App\Enums;

enum OrderStatusEnum : string
{
    case PENDING_PAYMENT = 'pending_payment';
    case PAID_SUCCESS    = 'paid_success';
    case PAID_FAILED     = 'paid_failed';
    case ABANDONED       = 'abandoned';
    case CANCELED        = 'canceled';
    case REFUND          = 'refund';
}
