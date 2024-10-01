<?php

namespace App\Enums;

enum EventTypeExecuteEnum: string
{
    case MANUAL             = 'manual';
    case AUTOMATIC          = 'automatic';
    case CRON               = 'cron';
    case PROGRESIVE         = 'progresive';
    case REVERSE_PROGRESIVE = 'reverse_progresive';

    public static function default(): string
    {
        return self::MANUAL->value;
    }
}
