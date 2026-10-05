<?php

namespace App\Repositories\Eloquent\Tarefa;

use Core\Domain\Tarefa\Entities\Tarefa;
use Core\Domain\Tarefa\Repositories\TarefaRepository;

class TarefaEloquentRepository implements TarefaRepository
{
    // todo: criar os métodos usando o Eloquent
    public function listarPorQuadroId(int $quadroId): array
    {

    }

    public function listarPorUsuarioId(int $usuarioId): array
    {

    }

    public function criar(int $quadroId, Tarefa $tarefa): Tarefa
    {

    }

    public function atualizar(int $id, Tarefa $tarefa): Tarefa
    {

    }

    public function apagar(int $id): void
    {

    }
}
