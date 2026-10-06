<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Application\Tarefa\DTOs\ListarQuadrosDTO;
use Core\Domain\Tarefa\Repositories\QuadroRepository;

class ListarQuadrosPorUsuarioIdUseCase
{
    public function __construct(private readonly QuadroRepository $quadroRepository) {}

    public function executar(ListarQuadrosDTO $dto): array
    {
        return $this->quadroRepository->listarPorUsuarioId($dto->usuarioId);
    }
}
