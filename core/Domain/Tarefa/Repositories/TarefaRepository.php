<?php

namespace Core\Domain\Tarefa\Repositories;

use Core\Domain\Tarefa\Entities\Tarefa;

interface TarefaRepository
{
    public function listarPorQuadroId(int $quadroId): array;
    public function listarPorUsuarioId(int $usuarioId): array;
    public function criar(int $quadroId, Tarefa $tarefa): Tarefa;
    public function atualizar(int $id, Tarefa $tarefa): Tarefa;
    public function apagar(int $id): void;
}
