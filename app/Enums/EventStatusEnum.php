<?php

namespace App\Enums;

enum EventStatusEnum: string
{
    case PUBLISHED = 'published';
    case CANCELED  = 'canceled';
    case ACTIVE    = 'active';
    case DISABLED  = 'disabled';
    case FINISHED  = 'finished';
}
