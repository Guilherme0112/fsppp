<?php

namespace App\Http\Controllers\Autenticacao;

use App\Http\Controllers\Controller;
use App\Http\Requisicoes\Autenticacao\EntrarRequisicao;
use Core\Application\Usuario\DTOs\EntrarDTO;
use Core\Application\Usuario\UseCases\EntrarUseCase;
use Core\Application\Usuario\UseCases\SairUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AutenticacaoController extends Controller
{
    public function entrar(EntrarRequisicao $requisicao, EntrarUseCase $casoDeUso): JsonResponse
    {
        return response()->json($casoDeUso->executar(
            EntrarDTO::daRequisicao($requisicao->validated()),
        ));
    }

    public function sair(Request $requisicao, SairUseCase $casoDeUso): JsonResponse
    {
        $casoDeUso->executar((int) $requisicao->user()->currentAccessToken()->getKey());
        return response()->json(null, 204);
    }
}
