<?php

namespace Core\Domain\Tarefa\Entities;

class Tarefa implements \JsonSerializable
{
    public function __construct(
        private readonly ?int $id,
        private readonly string $nome,
        private readonly int $status_id,
        private readonly int $quadro_id,
        private readonly ?string $descricao = null,
        private readonly ?\DateTimeImmutable $data_inicio = null,
        private readonly ?\DateTimeImmutable $data_fim = null,
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

    public function statusId(): int
    {
        return $this->status_id;
    }

    public function quadroId(): int
    {
        return $this->quadro_id;
    }

    public function descricao(): ?string
    {
        return $this->descricao;
    }

    public function dataInicio(): ?\DateTimeImmutable
    {
        return $this->data_inicio;
    }

    public function dataFim(): ?\DateTimeImmutable
    {
        return $this->data_fim;
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
            'status_id' => $this->status_id,
            'quadro_id' => $this->quadro_id,
            'descricao' => $this->descricao,
            'data_inicio' => $this->data_inicio?->format(DATE_ATOM),
            'data_fim' => $this->data_fim?->format(DATE_ATOM),
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
