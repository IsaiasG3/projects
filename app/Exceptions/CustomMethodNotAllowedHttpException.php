<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class CustomMethodNotAllowedException extends MethodNotAllowedHttpException
{
    public function __construct(array $allowedMethods, $message = 'Method Not Allowed')
    {
        parent::__construct($allowedMethods, $message);
    }
}
