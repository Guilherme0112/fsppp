<?php

namespace Core\Application\Usuario\UseCases;

use Core\Domain\Usuario\Repositories\AutenticacaoRepository;

class SairUseCase
{
    public function __construct(private readonly AutenticacaoRepository $repositorio) {}

    public function executar(int $tokenId): void
    {
        $this->repositorio->revogarToken($tokenId);
    }
}
