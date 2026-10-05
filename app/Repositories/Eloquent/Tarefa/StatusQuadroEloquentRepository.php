<?php

namespace App\Repositories\Eloquent\Tarefa;

use Core\Domain\Tarefa\Entities\StatusQuadro;
use Core\Domain\Tarefa\Repositories\StatusQuadroRepository;

class StatusQuadroEloquentRepository implements StatusQuadroRepository
{
    // todo: criar os métodos usando o Eloquent
    public function listarPorQuadroId(int $quadroId): array
    {

    }

    public function criar(StatusQuadro $statusQuadro): StatusQuadro
    {

    }

    public function atualizar(int $quadroId, StatusQuadro $statusQuadro): StatusQuadro
    {

    }

    public function apagar(int $id): void
    {

    }
}
