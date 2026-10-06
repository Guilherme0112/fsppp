<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Domain\Tarefa\Exceptions\RecursoNaoEncontradoException;
use Core\Domain\Tarefa\Repositories\StatusQuadroRepository;

class ApagarStatusQuadroUseCase
{
    public function __construct(private readonly StatusQuadroRepository $repositorio) {}

    public function executar(int $id, int $usuarioId): void
    {
        if (! $this->repositorio->pertenceAoUsuario($id, $usuarioId)) {
            throw new RecursoNaoEncontradoException;
        }

        $this->repositorio->apagar($id);
    }
}
