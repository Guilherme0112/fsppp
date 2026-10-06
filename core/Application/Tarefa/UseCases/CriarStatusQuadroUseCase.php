<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Application\Tarefa\DTOs\CriarStatusQuadroDTO;
use Core\Domain\Tarefa\Entities\StatusQuadro;
use Core\Domain\Tarefa\Exceptions\RecursoNaoEncontradoException;
use Core\Domain\Tarefa\Repositories\QuadroRepository;
use Core\Domain\Tarefa\Repositories\StatusQuadroRepository;

class CriarStatusQuadroUseCase
{
    public function __construct(
        private readonly StatusQuadroRepository $repositorio,
        private readonly QuadroRepository $quadroRepository,
    ) {}

    public function executar(CriarStatusQuadroDTO $dto): StatusQuadro
    {
        if (! $this->quadroRepository->pertenceAoUsuario($dto->quadroId, $dto->usuarioId)) {
            throw new RecursoNaoEncontradoException;
        }

        return $this->repositorio->criar($dto->paraEntidade());
    }
}
