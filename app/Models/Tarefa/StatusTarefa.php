<?php

namespace App\Models\Tarefa;

use App\Models\ModelBase;

class StatusTarefa extends ModelBase
{
    protected $table = "status_tarefas";
    protected $primaryKey = "status_tarefa_id";
    protected $fillable = [
        "nome",
    ];

    protected $casts = [
        "criado_em" => "datetime",
        "atualizado_em" => "datetime",
        "apagado_em" => "datetime",
    ];

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';
    const DELETED_AT = 'apagado_em';
}
