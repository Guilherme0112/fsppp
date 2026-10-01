<?php

namespace Core\Domain\Tarefa\Entities;

class StatusTarefa
{
    public function __construct(
        private readonly ?int $status_tarefa_id,
        private readonly string $nome,
        private readonly ?\DateTimeImmutable $criado_em = null,
        private readonly ?\DateTimeImmutable $atualizado_em = null,
        private readonly ?\DateTimeImmutable $apagado_em = null,
    ) {
    }
}
