<?php

namespace App\Repositories\Eloquent\Tarefa;

use App\Mapeadores\Tarefa\QuadroMapeador;
use App\Models\Tarefa\Quadro as QuadroModelo;
use Core\Domain\Tarefa\Entities\Quadro;
use Core\Domain\Tarefa\Repositories\QuadroRepository;

class QuadroEloquentRepository implements QuadroRepository
{
    public function __construct(private readonly QuadroMapeador $mapeador) {}

    public function listarPorUsuarioId(int $usuarioId): array
    {
        return QuadroModelo::query()->where('usuario_id', $usuarioId)->get()
            ->map(fn (QuadroModelo $modelo): Quadro => $this->mapeador->paraEntidade($modelo))->all();
    }

    public function criar(Quadro $quadro): Quadro
    {
        $modelo = $this->mapeador->paraModelo($quadro);
        $modelo->save();

        return $this->mapeador->paraEntidade($modelo->refresh());
    }

    public function atualizar(int $id, Quadro $quadro): Quadro
    {
        $modelo = QuadroModelo::query()->findOrFail($id);
        $this->mapeador->paraModelo($quadro, $modelo)->save();

        return $this->mapeador->paraEntidade($modelo->refresh());
    }

    public function apagar(int $id): void
    {
        QuadroModelo::query()->findOrFail($id)->delete();
    }

    public function pertenceAoUsuario(int $id, int $usuarioId): bool
    {
        return QuadroModelo::query()->whereKey($id)->where('usuario_id', $usuarioId)->exists();
    }
}
