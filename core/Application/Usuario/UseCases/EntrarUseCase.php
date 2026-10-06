<?php

namespace Core\Application\Usuario\UseCases;

use Core\Application\Usuario\DTOs\EntrarDTO;
use Core\Domain\Usuario\Entities\SessaoAutenticada;
use Core\Domain\Usuario\Exceptions\CredenciaisInvalidasException;
use Core\Domain\Usuario\Repositories\AutenticacaoRepository;

class EntrarUseCase
{
    public function __construct(private readonly AutenticacaoRepository $repositorio) {}

    public function executar(EntrarDTO $dto): SessaoAutenticada
    {
        return $this->repositorio->autenticar($dto->email, $dto->senha, $dto->nomeDispositivo)
            ?? throw new CredenciaisInvalidasException;
    }
}
