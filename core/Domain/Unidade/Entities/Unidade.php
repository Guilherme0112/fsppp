<?php

namespace Core\Domain\Unidade\Entities;

class Unidade
{
    public function __construct(
        private readonly ?int $id,
        private readonly string $nome,
        private readonly string $cnpj,
        private readonly ?\DateTimeImmutable $criado_em = null,
        private readonly ?\DateTimeImmutable $atualizado_em = null,
        private readonly ?\DateTimeImmutable $apagado_em = null,
    ) {
    }
}
