<?php

namespace App\Mapeadores;

use App\Models\Endereco as EnderecoModelo;
use Core\Domain\Endereco\Entities\Endereco as EnderecoEntidade;
use DateTimeImmutable;
use DateTimeInterface;

class EnderecoMapeador
{
    public function paraEntidade(EnderecoModelo $modelo): EnderecoEntidade
    {
        return new EnderecoEntidade(
            id: $modelo->getKey(),
            logradouro: $modelo->logradouro,
            numero: $modelo->numero,
            complemento: $modelo->complemento,
            bairro: $modelo->bairro,
            cidade: $modelo->cidade,
            estado: $modelo->estado,
            cep: $modelo->cep,
            criado_em: $this->data($modelo->criado_em),
            atualizado_em: $this->data($modelo->atualizado_em),
            apagado_em: $this->data($modelo->apagado_em),
        );
    }

    public function paraModelo(EnderecoEntidade $entidade, ?EnderecoModelo $modelo = null): EnderecoModelo
    {
        $modelo ??= new EnderecoModelo;
        $modelo->fill([
            'logradouro' => $entidade->logradouro(),
            'numero' => $entidade->numero(),
            'complemento' => $entidade->complemento(),
            'bairro' => $entidade->bairro(),
            'cidade' => $entidade->cidade(),
            'estado' => $entidade->estado(),
            'cep' => $entidade->cep(),
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
