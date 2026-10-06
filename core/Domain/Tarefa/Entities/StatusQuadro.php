<?php

namespace Core\Domain\Tarefa\Entities;

class StatusQuadro implements \JsonSerializable
{
    public function __construct(
        private readonly ?int $id,
        private readonly string $nome,
        private readonly int $quadro_id,
        private readonly ?string $descricao = null,
        private readonly ?\DateTimeImmutable $criado_em = null,
        private readonly ?\DateTimeImmutable $atualizado_em = null,
        private readonly ?\DateTimeImmutable $apagado_em = null,
    ) {}

    public function id(): ?int
    {
        return $this->id;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function quadroId(): int
    {
        return $this->quadro_id;
    }

    public function descricao(): ?string
    {
        return $this->descricao;
    }

    public function criadoEm(): ?\DateTimeImmutable
    {
        return $this->criado_em;
    }

    public function atualizadoEm(): ?\DateTimeImmutable
    {
        return $this->atualizado_em;
    }

    public function apagadoEm(): ?\DateTimeImmutable
    {
        return $this->apagado_em;
    }

    public function paraArray(): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'quadro_id' => $this->quadro_id,
            'descricao' => $this->descricao,
            'criado_em' => $this->criado_em?->format(DATE_ATOM),
            'atualizado_em' => $this->atualizado_em?->format(DATE_ATOM),
            'apagado_em' => $this->apagado_em?->format(DATE_ATOM),
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->paraArray();
    }
}
