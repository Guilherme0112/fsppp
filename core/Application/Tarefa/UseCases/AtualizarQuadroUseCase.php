<?php

namespace Core\Application\Tarefa\UseCases;

use Core\Application\Tarefa\DTOs\AtualizarQuadroDTO;
use Core\Domain\Tarefa\Entities\Quadro;
use Core\Domain\Tarefa\Exceptions\RecursoNaoEncontradoException;
use Core\Domain\Tarefa\Repositories\QuadroRepository;

class AtualizarQuadroUseCase
{
    public function __construct(private readonly QuadroRepository $quadroRepository) {}

    public function executar(AtualizarQuadroDTO $dto): Quadro
    {
        if (! $this->quadroRepository->pertenceAoUsuario($dto->id, $dto->usuarioId)) {
            throw new RecursoNaoEncontradoException;
        }

        return $this->quadroRepository->atualizar($dto->id, $dto->paraEntidade());
    }
}
