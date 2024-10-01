<?php

namespace App\Enums;

enum LogActionEnum : string
{
    case UPDATE          = 'update';
    case DELETE          = 'delete';
    case CREATE          = 'create';
    case RESTORE         = 'restore';
    case FORCE_DELETE    = 'force_delete';
    case LOGIN           = 'login';
    case LOGOUT          = 'logout';
    case REGISTER        = 'register';
    case FORGOT_PASSWORD = 'forgot_password';
    case RESET_PASSWORD  = 'reset_password';
}
