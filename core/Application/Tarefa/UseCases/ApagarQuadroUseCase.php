<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Domain\Tarefa\Exceptions\RecursoNaoEncontradoException;
use Core\Domain\Tarefa\Repositories\QuadroRepository;

class ApagarQuadroUseCase
{
    public function __construct(private readonly QuadroRepository $quadroRepository) {}

    public function executar(int $id, int $usuarioId): void
    {
        if (! $this->quadroRepository->pertenceAoUsuario($id, $usuarioId)) {
            throw new RecursoNaoEncontradoException;
        }

        $this->quadroRepository->apagar($id);
    }
}
