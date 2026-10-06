<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForcarRespostaJson
{
    public function handle(Request $requisicao, Closure $proximo): Response
    {
        $requisicao->headers->set('Accept', 'application/json');

        return $proximo($requisicao);
    }
}
