<?php

namespace App\Http\Controllers\Tarefa;

use App\Http\Controllers\Controller;

class TarefaController extends Controller
{
    public function listarTarefas()
    {
        return response()->json(['message' => 'Listar tarefas']);
    }

    public function criarTarefa()
    {
        return response()->json(['message' => 'Criar tarefa']);
    }

    public function atualizarTarefa()
    {
        return response()->json(['message' => 'Atualizar tarefa']);

    }

    public function apagarTarefa()
    {
        return response()->json(['message' => 'Deletar tarefa']);
    }
}
