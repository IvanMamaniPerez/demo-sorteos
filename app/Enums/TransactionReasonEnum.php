<?php

namespace App\Enums;

enum TransactionReasonEnum : string
{
    case DEPOSIT         = 'deposit';
    case PURCHASE_CREDIT = 'purchase_credit';
    case SALE_CREDIT     = 'sale_credit';
    case PURCHASE_TICKET = 'purchase_ticket';
    case SALE_TICKET     = 'sale_ticket';
    case CREATE_EVENT    = 'create_event';
    case GUARANTEE       = 'guarantee';
    case WITHDRAW        = 'withdraw';
    case SUBSCRIPTION    = 'subscription';
    case REFUND          = 'refund';
}
