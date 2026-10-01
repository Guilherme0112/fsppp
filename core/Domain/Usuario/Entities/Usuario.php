<?php

namespace Core\Domain\Usuario\Entities;

class Usuario
{
    public function __construct(
        private readonly ?int $id,
        private readonly string $nome,
        private readonly string $email,
        private readonly string $senha,
        private readonly ?\DateTimeImmutable $email_verificado_em = null,
        private readonly ?string $remember_token = null,
        private readonly ?\DateTimeImmutable $criado_em = null,
        private readonly ?\DateTimeImmutable $atualizado_em = null,
    ) {
    }
}
