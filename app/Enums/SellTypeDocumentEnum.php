<?php

namespace App\Enums;

enum SellTypeDocumentEnum: string
{
    
    case CREDIT_NOTE = 'credit_note';
    case DEBIT_NOTE  = 'debit_note';
    case INVOICE     = 'invoice';
    case RECEIPT     = 'receipt';
    case SALES_NOTE  = 'sales_note';
}
