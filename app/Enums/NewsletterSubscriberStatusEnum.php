<?php

namespace App\Enums;

enum NewsletterSubscriberStatusEnum : string
{
    case SUBSCRIBED   = 'subscribed';
    case UNSUBSCRIBED = 'unsubscribed';
}
