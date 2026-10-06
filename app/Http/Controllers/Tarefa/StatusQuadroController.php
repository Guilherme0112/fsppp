<?php

namespace App\Http\Controllers\Tarefa;

use App\Http\Controllers\Controller;
use App\Http\Requisicoes\Tarefa\SalvarStatusQuadroRequisicao;
use App\Http\Requisicoes\UsuarioAutenticadoRequisicao;
use Core\Application\Tarefa\DTOs\AtualizarStatusQuadroDTO;
use Core\Application\Tarefa\DTOs\CriarStatusQuadroDTO;
use Core\Application\Tarefa\UseCases\ApagarStatusQuadroUseCase;
use Core\Application\Tarefa\UseCases\AtualizarStatusQuadroUseCase;
use Core\Application\Tarefa\UseCases\CriarStatusQuadroUseCase;
use Core\Application\Tarefa\UseCases\ListarStatusQuadroUseCase;
use Illuminate\Http\JsonResponse;

class StatusQuadroController extends Controller
{
    public function listarStatusPorQuadro(
        UsuarioAutenticadoRequisicao $requisicao,
        int $quadroId,
        ListarStatusQuadroUseCase $casoDeUso,
    ): JsonResponse {
        return response()->json($casoDeUso->executar($quadroId, $requisicao->usuarioId()));
    }

    public function criarStatus(
        SalvarStatusQuadroRequisicao $requisicao,
        int $quadroId,
        CriarStatusQuadroUseCase $casoDeUso,
    ): JsonResponse {
        return response()->json($casoDeUso->executar(
            CriarStatusQuadroDTO::daRequisicao($requisicao->validated(), $quadroId, $requisicao->usuarioId()),
        ), 201);
    }

    public function editarStatus(
        SalvarStatusQuadroRequisicao $requisicao,
        int $quadroId,
        int $id,
        AtualizarStatusQuadroUseCase $casoDeUso,
    ): JsonResponse {
        return response()->json($casoDeUso->executar(
            AtualizarStatusQuadroDTO::daRequisicao(
                $requisicao->validated(),
                $quadroId,
                $id,
                $requisicao->usuarioId(),
            ),
        ));
    }

    public function apagarStatus(
        UsuarioAutenticadoRequisicao $requisicao,
        int $quadroId,
        int $id,
        ApagarStatusQuadroUseCase $casoDeUso,
    ): JsonResponse {
        $casoDeUso->executar($id, $requisicao->usuarioId());

        return response()->json(null, 204);
    }
}
