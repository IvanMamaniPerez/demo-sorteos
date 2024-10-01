<?php

namespace App\Enums;

enum ReportStatusEnum : string
{
    case PENDING  = 'pending';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
    case CANCELED = 'canceled';
}
