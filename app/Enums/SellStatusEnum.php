<?php

namespace App\Enums;

enum SellStatusEnum : string
{
    case CPE_SENT = 'cpe_sent';
    case CPE_ACCEPTED = 'cpe_accepted';
    case CPE_REJECTED = 'cpe_rejected';
    case CPE_OBSERVED = 'cpe_observed';
    case CPE_REVERSED = 'cpe_reversed';
    case CPE_VOIDED = 'cpe_voided';
    case CPE_CANCELED = 'cpe_canceled';
    case CPE_UNKNOWN = 'cpe_unknown';
}
