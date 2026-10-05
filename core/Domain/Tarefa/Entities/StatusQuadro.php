<?php

namespace Core\Domain\Tarefa\Entities;

class StatusQuadro
{
    public function __construct(
        private readonly ?int $id,
        private readonly string $nome,
        private readonly ?\DateTimeImmutable $criado_em = null,
        private readonly ?\DateTimeImmutable $atualizado_em = null,
        private readonly ?\DateTimeImmutable $apagado_em = null,
    ) {
    }
}
