<?php

namespace App\Repositories\Eloquent\Tarefa;

use Core\Domain\Tarefa\Entities\Quadro;
use Core\Domain\Tarefa\Repositories\QuadroRepository;

class QuadroEloquentRepository implements QuadroRepository
{
    // todo: criar os métodos usando o Eloquent
    public function listarPorUsuarioId(int $usuarioId): array
    {

    }


    public function criar(Quadro $quadro): Quadro
    {

    }

    public function atualizar(int $id, Quadro $quadro): Quadro
    {

    }

    public function apagar(int $id): void
    {

    }
}
