<?php

namespace App\Models\Tarefa;

use App\Models\ModelBase;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends ModelBase
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'status_id',
        'data_inicio',
        'data_fim',
        'quadro_id',
    ];

    protected $casts = [
        'data_inicio' => 'datetime',
        'data_fim' => 'datetime',
        'criado_em' => 'datetime',
        'atualizado_em' => 'datetime',
        'apagado_em' => 'datetime',
    ];

    const CREATED_AT = 'criado_em';

    const UPDATED_AT = 'atualizado_em';

    const DELETED_AT = 'apagado_em';

    public function quadro(): BelongsTo
    {
        return $this->belongsTo(Quadro::class, 'quadro_id');
    }

    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class, 'tarefa_usuario', 'tarefa_id', 'usuario_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusQuadro::class, 'status_id');
    }
}
