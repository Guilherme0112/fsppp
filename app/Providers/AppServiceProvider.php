<?php

namespace App\Providers;

use App\Repositories\Eloquent\Tarefa\QuadroEloquentRepository;
use App\Repositories\Eloquent\Tarefa\StatusQuadroEloquentRepository;
use App\Repositories\Eloquent\Tarefa\TarefaEloquentRepository;
use App\Repositories\Eloquent\Usuario\SanctumAutenticacaoRepository;
use Core\Domain\Tarefa\Repositories\QuadroRepository;
use Core\Domain\Tarefa\Repositories\StatusQuadroRepository;
use Core\Domain\Tarefa\Repositories\TarefaRepository;
use Core\Domain\Usuario\Repositories\AutenticacaoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TarefaRepository::class, TarefaEloquentRepository::class);
        $this->app->bind(QuadroRepository::class, QuadroEloquentRepository::class);
        $this->app->bind(StatusQuadroRepository::class, StatusQuadroEloquentRepository::class);
        $this->app->bind(AutenticacaoRepository::class, SanctumAutenticacaoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
