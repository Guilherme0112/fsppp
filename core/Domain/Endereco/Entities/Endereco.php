<?php

namespace Core\Domain\Endereco\Entities;

class Endereco
{
    public function __construct(
        private readonly ?int $id,
        private readonly ?string $logradouro = null,
        private readonly ?string $numero = null,
        private readonly ?string $complemento = null,
        private readonly ?string $bairro = null,
        private readonly ?string $cidade = null,
        private readonly ?string $estado = null,
        private readonly ?string $cep = null,
        private readonly ?\DateTimeImmutable $criado_em = null,
        private readonly ?\DateTimeImmutable $atualizado_em = null,
        private readonly ?\DateTimeImmutable $apagado_em = null,
    ) {
    }
}
