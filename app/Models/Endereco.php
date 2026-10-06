<?php

namespace App\Models;

class Endereco extends ModelBase
{
    protected $table = 'endereco';

    protected $fillable = [
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'cep',
    ];

    public function enderecoable()
    {
        return $this->morphTo();
    }
}
