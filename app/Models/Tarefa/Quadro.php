<?php

namespace App\Models\Tarefa;

use App\Models\ModelBase;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quadro extends ModelBase
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'usuario_id',
    ];

    protected $casts = [
        'criado_em' => 'datetime',
        'atualizado_em' => 'datetime',
        'apagado_em' => 'datetime',
    ];

    const CREATED_AT = 'criado_em';

    const UPDATED_AT = 'atualizado_em';

    const DELETED_AT = 'apagado_em';

    public function tarefas(): HasMany
    {
        return $this->hasMany(Tarefa::class);
    }

    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class, 'quadro_usuario', 'quadro_id', 'usuario_id');
    }

    public function dono(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
