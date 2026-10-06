<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Application\Tarefa\DTOs\CriarTarefaDTO;
use Core\Domain\Tarefa\Entities\Tarefa;
use Core\Domain\Tarefa\Exceptions\RecursoNaoEncontradoException;
use Core\Domain\Tarefa\Repositories\QuadroRepository;
use Core\Domain\Tarefa\Repositories\StatusQuadroRepository;
use Core\Domain\Tarefa\Repositories\TarefaRepository;

class CriarTarefaUseCase
{
    public function __construct(
        private readonly TarefaRepository $tarefaRepository,
        private readonly QuadroRepository $quadroRepository,
        private readonly StatusQuadroRepository $statusQuadroRepository,
    ) {}

    public function executar(CriarTarefaDTO $dto): Tarefa
    {
        if (! $this->quadroRepository->pertenceAoUsuario($dto->quadroId, $dto->usuarioId)
            || ! $this->statusQuadroRepository->pertenceAoQuadro($dto->statusId, $dto->quadroId)) {
            throw new RecursoNaoEncontradoException;
        }

        return $this->tarefaRepository->criar($dto->quadroId, $dto->paraEntidade());
    }
}
