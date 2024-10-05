<?php

namespace App\Enums;

enum ViewOriginEnum : string
{
    case HOME        = 'home';
    case SINGLE_PAGE = 'single_page';
    case PROFILE     = 'profile';
}
