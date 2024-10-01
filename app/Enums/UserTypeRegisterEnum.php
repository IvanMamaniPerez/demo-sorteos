<?php

namespace App\Enums;

enum UserTypeRegisterEnum : string
{
    case MANUAL   = 'manual';
    case GOOGLE   = 'google';
    case FACEBOOK = 'facebook';
    case FORM     = 'form';
}
