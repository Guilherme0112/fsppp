<?php

namespace Core\Domain\Tarefa\Exceptions;

use RuntimeException;

class RecursoNaoEncontradoException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Recurso não encontrado.');
    }
}
