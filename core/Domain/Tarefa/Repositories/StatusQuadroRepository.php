<?php

namespace Core\Domain\Tarefa\Repositories;

use Core\Domain\Tarefa\Entities\StatusQuadro;

interface StatusQuadroRepository
{
    public function listarPorQuadroId(int $id): array;

    public function criar(StatusQuadro $statusQuadro): StatusQuadro;

    public function atualizar(int $id, StatusQuadro $statusQuadro): StatusQuadro;

    public function apagar(int $id): void;

    public function pertenceAoUsuario(int $id, int $usuarioId): bool;

    public function pertenceAoQuadro(int $id, int $quadroId): bool;
}
