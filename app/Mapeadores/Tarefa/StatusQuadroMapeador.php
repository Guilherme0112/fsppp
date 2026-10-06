<?php

namespace App\Mapeadores\Tarefa;

use App\Models\Tarefa\StatusQuadro as StatusQuadroModelo;
use Core\Domain\Tarefa\Entities\StatusQuadro as StatusQuadroEntidade;
use DateTimeImmutable;
use DateTimeInterface;

class StatusQuadroMapeador
{
    public function paraEntidade(StatusQuadroModelo $modelo): StatusQuadroEntidade
    {
        return new StatusQuadroEntidade(
            id: $modelo->getKey(),
            nome: $modelo->nome,
            quadro_id: $modelo->quadro_id,
            descricao: $modelo->descricao,
            criado_em: $this->paraDataImutavel($modelo->criado_em),
            atualizado_em: $this->paraDataImutavel($modelo->atualizado_em),
            apagado_em: $this->paraDataImutavel($modelo->apagado_em),
        );
    }

    public function paraModelo(
        StatusQuadroEntidade $entidade,
        ?StatusQuadroModelo $modelo = null,
    ): StatusQuadroModelo {
        $modelo ??= new StatusQuadroModelo;
        $modelo->fill([
            'nome' => $entidade->nome(),
            'quadro_id' => $entidade->quadroId(),
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
