<?php

namespace App\Domains\Wallet\Exceptions;

class InsufficientFundsException extends \Exception
{
    public function __construct($message = 'Fundos insuficientes para completar essa transação.', $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
