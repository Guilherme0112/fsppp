<?php

namespace Core\Domain\Usuario\Exceptions;

use RuntimeException;

class CredenciaisInvalidasException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('As credenciais informadas são inválidas.');
    }
}
