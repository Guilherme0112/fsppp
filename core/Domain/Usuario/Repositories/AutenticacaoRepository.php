<?php

namespace Core\Domain\Usuario\Repositories;

use Core\Domain\Usuario\Entities\SessaoAutenticada;

interface AutenticacaoRepository
{
    public function autenticar(string $email, string $senha, string $nomeDispositivo): ?SessaoAutenticada;

    public function revogarToken(int $tokenId): void;
}
