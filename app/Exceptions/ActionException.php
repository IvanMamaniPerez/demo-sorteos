<?php

namespace App\Exceptions;

use Exception;

class ActionException extends Exception
{
    //
    public function __construct($message = 'Invalid action.', $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
