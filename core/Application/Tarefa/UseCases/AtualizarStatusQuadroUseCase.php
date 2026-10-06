<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Application\Tarefa\DTOs\AtualizarStatusQuadroDTO;
use Core\Domain\Tarefa\Entities\StatusQuadro;
use Core\Domain\Tarefa\Exceptions\RecursoNaoEncontradoException;
use Core\Domain\Tarefa\Repositories\QuadroRepository;
use Core\Domain\Tarefa\Repositories\StatusQuadroRepository;

class AtualizarStatusQuadroUseCase
{
    public function __construct(
        private readonly StatusQuadroRepository $repositorio,
        private readonly QuadroRepository $quadroRepository,
    ) {}

    public function executar(AtualizarStatusQuadroDTO $dto): StatusQuadro
    {
        if (! $this->repositorio->pertenceAoUsuario($dto->id, $dto->usuarioId)
            || ! $this->quadroRepository->pertenceAoUsuario($dto->quadroId, $dto->usuarioId)) {
            throw new RecursoNaoEncontradoException;
        }

        return $this->repositorio->atualizar($dto->id, $dto->paraEntidade());
    }
}
