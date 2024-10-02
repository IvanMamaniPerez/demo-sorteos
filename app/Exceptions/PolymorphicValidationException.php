<?php

namespace App\Exceptions;

use Exception;

class PolymorphicValidationException extends Exception
{
    //
    public function __construct($message = 'Invalid polymorphic relationship.')
    {
        parent::__construct($message);
    }
}
