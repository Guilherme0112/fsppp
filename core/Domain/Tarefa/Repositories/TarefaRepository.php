<?php

namespace Core\Domain\Tarefa\Repositories;

use Core\Domain\Tarefa\Entities\Tarefa;

interface TarefaRepository
{
    public function listarTarefasPorQuadroId(int $quadroId): array;
    public function listarTarefasPorUsuarioId(int $usuarioId): array;
    public function criarTarefa(int $quadroId, Tarefa $tarefa): Tarefa;
    public function atualizar(int $id, Tarefa $tarefa): Tarefa;
    public function apagar(int $id): void;
}
