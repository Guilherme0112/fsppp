<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Domain\Tarefa\Exceptions\RecursoNaoEncontradoException;
use Core\Domain\Tarefa\Repositories\TarefaRepository;

class ApagarTarefaUseCase
{
    public function __construct(private readonly TarefaRepository $tarefaRepository) {}

    public function executar(int $id, int $usuarioId): void
    {
        if (! $this->tarefaRepository->pertenceAoUsuario($id, $usuarioId)) {
            throw new RecursoNaoEncontradoException;
        }

        $this->tarefaRepository->apagar($id);
    }
}
