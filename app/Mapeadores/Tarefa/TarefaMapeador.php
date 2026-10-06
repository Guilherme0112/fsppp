<?php

namespace App\Mapeadores\Tarefa;

use App\Models\Tarefa\Tarefa as TarefaModelo;
use Core\Domain\Tarefa\Entities\Tarefa as TarefaEntidade;
use DateTimeImmutable;
use DateTimeInterface;

class TarefaMapeador
{
    public function paraEntidade(TarefaModelo $modelo): TarefaEntidade
    {
        return new TarefaEntidade(
            id: $modelo->getKey(),
            nome: $modelo->nome,
            status_id: $modelo->status_id,
            quadro_id: $modelo->quadro_id,
            descricao: $modelo->descricao,
            data_inicio: $this->paraDataImutavel($modelo->data_inicio),
            data_fim: $this->paraDataImutavel($modelo->data_fim),
            criado_em: $this->paraDataImutavel($modelo->criado_em),
            atualizado_em: $this->paraDataImutavel($modelo->atualizado_em),
            apagado_em: $this->paraDataImutavel($modelo->apagado_em),
        );
    }

    public function paraModelo(TarefaEntidade $entidade, ?TarefaModelo $modelo = null): TarefaModelo
    {
        $modelo ??= new TarefaModelo;
        $modelo->fill([
            'nome' => $entidade->nome(),
            'status_id' => $entidade->statusId(),
            'quadro_id' => $entidade->quadroId(),
            'descricao' => $entidade->descricao(),
            'data_inicio' => $entidade->dataInicio(),
            'data_fim' => $entidade->dataFim(),
        ]);

        $this->aplicarIdentidadeETimestamps($modelo, $entidade->id(), [
            'criado_em' => $entidade->criadoEm(),
            'atualizado_em' => $entidade->atualizadoEm(),
            'apagado_em' => $entidade->apagadoEm(),
        ]);

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

    private function aplicarIdentidadeETimestamps(TarefaModelo $modelo, ?int $id, array $timestamps): void
    {
        if ($id !== null) {
            $modelo->setAttribute($modelo->getKeyName(), $id);
        }

        foreach ($timestamps as $campo => $valor) {
            if ($valor !== null) {
                $modelo->setAttribute($campo, $valor);
            }
        }
    }
}
