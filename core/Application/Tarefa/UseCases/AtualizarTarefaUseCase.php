<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Application\Tarefa\DTOs\AtualizarTarefaDTO;
use Core\Domain\Tarefa\Entities\Tarefa;
use Core\Domain\Tarefa\Exceptions\RecursoNaoEncontradoException;
use Core\Domain\Tarefa\Repositories\QuadroRepository;
use Core\Domain\Tarefa\Repositories\StatusQuadroRepository;
use Core\Domain\Tarefa\Repositories\TarefaRepository;

class AtualizarTarefaUseCase
{
    public function __construct(
        private readonly TarefaRepository $tarefaRepository,
        private readonly QuadroRepository $quadroRepository,
        private readonly StatusQuadroRepository $statusQuadroRepository,
    ) {}

    public function executar(AtualizarTarefaDTO $dto): Tarefa
    {
        if (! $this->tarefaRepository->pertenceAoUsuario($dto->id, $dto->usuarioId)
            || ! $this->quadroRepository->pertenceAoUsuario($dto->quadroId, $dto->usuarioId)
            || ! $this->statusQuadroRepository->pertenceAoQuadro($dto->statusId, $dto->quadroId)) {
            throw new RecursoNaoEncontradoException;
        }

        return $this->tarefaRepository->atualizar($dto->id, $dto->paraEntidade());
    }
}
