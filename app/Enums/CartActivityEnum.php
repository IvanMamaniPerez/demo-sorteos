<?php

namespace App\Enums;

enum CartActivityEnum : string
{
    case ADD_ITEM = 'add_item';
    case REMOVE_ITEM = 'remove_item';
    case UPDATE_ITEM = 'update_item';
    case CLEAR_CART = 'clear_cart';
    case CHECKOUT = 'checkout';
    case CANCEL_CHECKOUT = 'cancel_checkout';
    case PAYMENT = 'payment';
}
