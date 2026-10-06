<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Domain\Tarefa\Exceptions\RecursoNaoEncontradoException;
use Core\Domain\Tarefa\Repositories\QuadroRepository;
use Core\Domain\Tarefa\Repositories\StatusQuadroRepository;

class ListarStatusQuadroUseCase
{
    public function __construct(
        private readonly StatusQuadroRepository $repositorio,
        private readonly QuadroRepository $quadroRepository,
    ) {}

    public function executar(int $quadroId, int $usuarioId): array
    {
        if (! $this->quadroRepository->pertenceAoUsuario($quadroId, $usuarioId)) {
            throw new RecursoNaoEncontradoException;
        }

        return $this->repositorio->listarPorQuadroId($quadroId);
    }
}
