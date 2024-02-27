<?php

namespace App\Domains\Exchange\Exceptions;

class ExchangeNotFoundException extends \Exception
{
    public function __construct($message = 'Conversão não encontrada ou suportada.', $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
