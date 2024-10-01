<?php

namespace App\Enums;

enum FileTypeEnum: string
{
    case IMAGE    = 'image';
    case VIDEO    = 'video';
    case AUDIO    = 'audio';
    case DOCUMENT = 'document';
}
