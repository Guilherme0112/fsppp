<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Application\Tarefa\DTOs\ListarTarefasDTO;
use Core\Domain\Tarefa\Repositories\TarefaRepository;

class ListarTarefasUseCase
{
    public function __construct(private readonly TarefaRepository $tarefaRepository) {}

    public function executar(ListarTarefasDTO $dto): array
    {
        return $this->tarefaRepository->listarPorUsuarioId($dto->usuarioId);
    }
}
