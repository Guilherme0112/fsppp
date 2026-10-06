<?php

namespace Core\Domain\Tarefa\Entities;

class Quadro implements \JsonSerializable
{
    public function __construct(
        private readonly ?int $id,
        private readonly string $nome,
        private readonly int $usuario_id,
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

    public function usuarioId(): int
    {
        return $this->usuario_id;
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
            'usuario_id' => $this->usuario_id,
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
