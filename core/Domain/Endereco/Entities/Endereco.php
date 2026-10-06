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
    ) {}

    public function id(): ?int
    {
        return $this->id;
    }

    public function logradouro(): ?string
    {
        return $this->logradouro;
    }

    public function numero(): ?string
    {
        return $this->numero;
    }

    public function complemento(): ?string
    {
        return $this->complemento;
    }

    public function bairro(): ?string
    {
        return $this->bairro;
    }

    public function cidade(): ?string
    {
        return $this->cidade;
    }

    public function estado(): ?string
    {
        return $this->estado;
    }

    public function cep(): ?string
    {
        return $this->cep;
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
}
