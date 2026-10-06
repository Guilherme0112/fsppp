<?php

namespace App\Http\Controllers\Tarefa;

use App\Http\Controllers\Controller;
use App\Http\Requisicoes\Tarefa\ListarTarefasRequisicao;
use App\Http\Requisicoes\Tarefa\SalvarTarefaRequisicao;
use App\Http\Requisicoes\UsuarioAutenticadoRequisicao;
use Core\Application\Tarefa\DTOs\AtualizarTarefaDTO;
use Core\Application\Tarefa\DTOs\CriarTarefaDTO;
use Core\Application\Tarefa\DTOs\ListarTarefasDTO;
use Core\Application\Tarefa\UseCases\ApagarTarefaUseCase;
use Core\Application\Tarefa\UseCases\AtualizarTarefaUseCase;
use Core\Application\Tarefa\UseCases\CriarTarefaUseCase;
use Core\Application\Tarefa\UseCases\ListarTarefasUseCase;
use Illuminate\Http\JsonResponse;

class TarefaController extends Controller
{
    public function listarTarefas(
        ListarTarefasRequisicao $requisicao,
        ListarTarefasUseCase $casoDeUso,
    ): JsonResponse {
        return response()->json($casoDeUso->executar(
            ListarTarefasDTO::daRequisicao($requisicao->validated(), $requisicao->usuarioId()),
        ));
    }

    public function criarTarefa(
        SalvarTarefaRequisicao $requisicao,
        CriarTarefaUseCase $casoDeUso,
    ): JsonResponse {
        return response()->json($casoDeUso->executar(
            CriarTarefaDTO::daRequisicao($requisicao->validated(), $requisicao->usuarioId()),
        ), 201);
    }

    public function atualizarTarefa(
        SalvarTarefaRequisicao $requisicao,
        int $id,
        AtualizarTarefaUseCase $casoDeUso,
    ): JsonResponse {
        return response()->json($casoDeUso->executar(
            AtualizarTarefaDTO::daRequisicao($requisicao->validated(), $id, $requisicao->usuarioId()),
        ));
    }

    public function apagarTarefa(
        UsuarioAutenticadoRequisicao $requisicao,
        int $id,
        ApagarTarefaUseCase $casoDeUso,
    ): JsonResponse {
        $casoDeUso->executar($id, $requisicao->usuarioId());

        return response()->json(null, 204);
    }
}
