<?php

namespace App\Models\Tarefa;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "nome",
        "descricao",
        "status",
        "data_inicio",
        "data_fim",
        "quadro_id",
    ];

    public function quadro(): BelongsTo
    {
        return $this->belongsTo(Quadro::class, "quadro_id");
    }

    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class, "tarefa_usuario", "tarefa_id", "usuario_id");
    }
}
