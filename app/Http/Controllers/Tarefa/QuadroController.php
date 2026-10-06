<?php

namespace App\Http\Controllers\Tarefa;

use App\Http\Controllers\Controller;
use App\Http\Requisicoes\Tarefa\ListarQuadrosRequisicao;
use App\Http\Requisicoes\Tarefa\SalvarQuadroRequisicao;
use App\Http\Requisicoes\UsuarioAutenticadoRequisicao;
use Core\Application\Tarefa\DTOs\AtualizarQuadroDTO;
use Core\Application\Tarefa\DTOs\CriarQuadroDTO;
use Core\Application\Tarefa\DTOs\ListarQuadrosDTO;
use Core\Application\Tarefa\UseCases\ApagarQuadroUseCase;
use Core\Application\Tarefa\UseCases\AtualizarQuadroUseCase;
use Core\Application\Tarefa\UseCases\CriarQuadroUseCase;
use Core\Application\Tarefa\UseCases\ListarQuadrosPorUsuarioIdUseCase;
use Illuminate\Http\JsonResponse;

class QuadroController extends Controller
{
    public function listarQuadros(
        ListarQuadrosRequisicao $requisicao,
        ListarQuadrosPorUsuarioIdUseCase $casoDeUso,
    ): JsonResponse {
        return response()->json($casoDeUso->executar(
            ListarQuadrosDTO::daRequisicao($requisicao->validated(), $requisicao->usuarioId()),
        ));
    }

    public function criarQuadro(
        SalvarQuadroRequisicao $requisicao,
        CriarQuadroUseCase $casoDeUso,
    ): JsonResponse {
        return response()->json($casoDeUso->executar(
            CriarQuadroDTO::daRequisicao($requisicao->validated(), $requisicao->usuarioId()),
        ), 201);
    }

    public function editarQuadro(
        SalvarQuadroRequisicao $requisicao,
        int $id,
        AtualizarQuadroUseCase $casoDeUso,
    ): JsonResponse {
        return response()->json($casoDeUso->executar(
            AtualizarQuadroDTO::daRequisicao($requisicao->validated(), $id, $requisicao->usuarioId()),
        ));
    }

    public function apagarQuadro(
        UsuarioAutenticadoRequisicao $requisicao,
        int $id,
        ApagarQuadroUseCase $casoDeUso,
    ): JsonResponse {
        $casoDeUso->executar($id, $requisicao->usuarioId());

        return response()->json(null, 204);
    }
}
