<?php

namespace App\Http\Requisicoes;

use Illuminate\Foundation\Http\FormRequest;

abstract class RequisicaoAutenticada extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function usuarioId(): int
    {
        return (int) $this->user()->getAuthIdentifier();
    }
}
