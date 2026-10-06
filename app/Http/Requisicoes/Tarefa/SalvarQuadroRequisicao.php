<?php

namespace App\Http\Requisicoes\Tarefa;

use App\Http\Requisicoes\RequisicaoAutenticada;

class SalvarQuadroRequisicao extends RequisicaoAutenticada
{
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
        ];
    }
}
