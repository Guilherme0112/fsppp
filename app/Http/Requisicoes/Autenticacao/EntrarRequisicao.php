<?php

namespace App\Http\Requisicoes\Autenticacao;

use Illuminate\Foundation\Http\FormRequest;

class EntrarRequisicao extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'senha' => ['required', 'string'],
            'nome_dispositivo' => ['sometimes', 'string', 'max:255'],
        ];
    }
}
