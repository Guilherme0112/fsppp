<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Application\Tarefa\DTOs\CriarQuadroDTO;
use Core\Domain\Tarefa\Entities\Quadro;
use Core\Domain\Tarefa\Repositories\QuadroRepository;

class CriarQuadroUseCase
{
    public function __construct(private readonly QuadroRepository $quadroRepository) {}

    public function executar(CriarQuadroDTO $dto): Quadro
    {
        return $this->quadroRepository->criar($dto->paraEntidade());
    }
}
