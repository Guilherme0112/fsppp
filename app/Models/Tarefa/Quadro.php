<?php

namespace App\Models\Tarefa;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quadro extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "nome",
        "descricao",
    ];

    public function tarefas(): HasMany
    {
        return $this->hasMany(Tarefa::class);
    }

    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class, "quadro_usuario", "quadro_id", "usuario_id");
    }
}
