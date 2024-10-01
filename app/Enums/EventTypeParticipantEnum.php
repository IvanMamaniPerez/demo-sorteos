<?php

namespace App\Enums;

enum EventTypeParticipantEnum:string
{
    case TICKETS     = 'tickets';
    case SUBSCRIBERS = 'subscribers';
    case MIXED       = 'mixed';
}
