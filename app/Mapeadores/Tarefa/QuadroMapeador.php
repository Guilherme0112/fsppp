<?php

namespace App\Mapeadores\Tarefa;

use App\Models\Tarefa\Quadro as QuadroModelo;
use Core\Domain\Tarefa\Entities\Quadro as QuadroEntidade;
use DateTimeImmutable;
use DateTimeInterface;

class QuadroMapeador
{
    public function paraEntidade(QuadroModelo $modelo): QuadroEntidade
    {
        return new QuadroEntidade(
            id: $modelo->getKey(),
            nome: $modelo->nome,
            usuario_id: $modelo->usuario_id,
            descricao: $modelo->descricao,
            criado_em: $this->paraDataImutavel($modelo->criado_em),
            atualizado_em: $this->paraDataImutavel($modelo->atualizado_em),
            apagado_em: $this->paraDataImutavel($modelo->apagado_em),
        );
    }

    public function paraModelo(QuadroEntidade $entidade, ?QuadroModelo $modelo = null): QuadroModelo
    {
        $modelo ??= new QuadroModelo;
        $modelo->fill([
            'nome' => $entidade->nome(),
            'usuario_id' => $entidade->usuarioId(),
            'descricao' => $entidade->descricao(),
        ]);

        if ($entidade->id() !== null) {
            $modelo->setAttribute($modelo->getKeyName(), $entidade->id());
        }

        foreach ([
            'criado_em' => $entidade->criadoEm(),
            'atualizado_em' => $entidade->atualizadoEm(),
            'apagado_em' => $entidade->apagadoEm(),
        ] as $campo => $valor) {
            if ($valor !== null) {
                $modelo->setAttribute($campo, $valor);
            }
        }

        return $modelo;
    }

    private function paraDataImutavel(mixed $data): ?DateTimeImmutable
    {
        if ($data === null) {
            return null;
        }

        return $data instanceof DateTimeInterface
            ? DateTimeImmutable::createFromInterface($data)
            : new DateTimeImmutable((string) $data);
    }
}
