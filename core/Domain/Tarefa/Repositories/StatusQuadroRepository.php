<?php

namespace Core\Domain\Tarefa\Repositories;

use Core\Domain\Tarefa\Entities\StatusQuadro;

interface StatusQuadroRepository
{
    public function listarPorQuadroId(int $id): array;
    public function criar(StatusQuadro $statusQuadro): StatusQuadro;
    public function atualizar(int $quadroId, StatusQuadro $statusQuadro): StatusQuadro;
    public function apagar(int $id): void;
}
