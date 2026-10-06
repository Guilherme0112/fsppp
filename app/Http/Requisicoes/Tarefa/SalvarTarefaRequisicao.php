<?php

namespace App\Http\Requisicoes\Tarefa;

use App\Http\Requisicoes\RequisicaoAutenticada;

class SalvarTarefaRequisicao extends RequisicaoAutenticada
{
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'status_id' => ['required', 'integer', 'min:1'],
            'quadro_id' => ['required', 'integer', 'min:1'],
            'descricao' => ['nullable', 'string'],
            'data_inicio' => ['nullable', 'date'],
            'data_fim' => ['nullable', 'date', 'after_or_equal:data_inicio'],
        ];
    }
}
