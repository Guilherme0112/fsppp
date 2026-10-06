<?php

namespace App\Mapeadores;

use App\Models\Unidade as UnidadeModelo;
use Core\Domain\Unidade\Entities\Unidade as UnidadeEntidade;
use DateTimeImmutable;
use DateTimeInterface;

class UnidadeMapeador
{
    public function paraEntidade(UnidadeModelo $modelo): UnidadeEntidade
    {
        return new UnidadeEntidade(
            id: $modelo->getKey(),
            nome: $modelo->nome,
            cnpj: $modelo->cnpj,
            criado_em: $this->data($modelo->criado_em),
            atualizado_em: $this->data($modelo->atualizado_em),
            apagado_em: $this->data($modelo->apagado_em),
        );
    }

    public function paraModelo(UnidadeEntidade $entidade, ?UnidadeModelo $modelo = null): UnidadeModelo
    {
        $modelo ??= new UnidadeModelo;
        $modelo->fill(['nome' => $entidade->nome(), 'cnpj' => $entidade->cnpj()]);
        $this->aplicar($modelo, $entidade->id(), [
            'criado_em' => $entidade->criadoEm(),
            'atualizado_em' => $entidade->atualizadoEm(),
            'apagado_em' => $entidade->apagadoEm(),
        ]);

        return $modelo;
    }

    private function aplicar(UnidadeModelo $modelo, ?int $id, array $atributos): void
    {
        if ($id !== null) {
            $modelo->setAttribute($modelo->getKeyName(), $id);
        }
        foreach ($atributos as $campo => $valor) {
            if ($valor !== null) {
                $modelo->setAttribute($campo, $valor);
            }
        }
    }

    private function data(mixed $data): ?DateTimeImmutable
    {
        if ($data === null) {
            return null;
        }

        return $data instanceof DateTimeInterface
            ? DateTimeImmutable::createFromInterface($data)
            : new DateTimeImmutable((string) $data);
    }
}
