<?php

namespace Core\Domain\Usuario\Entities;

use JsonSerializable;

class SessaoAutenticada implements JsonSerializable
{
    public function __construct(
        public Usuario $usuario,
        public string $token,
        public string $tipoToken = 'Bearer',
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'usuario' => $this->usuario->paraArray(),
            'token' => $this->token,
            'tipo_token' => $this->tipoToken,
        ];
    }
}
