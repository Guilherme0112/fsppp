<?php

namespace App\Models;


class Unidade extends ModelBase
{
    protected $fillable = [
        "nome",
        "cnpj"
    ];

    public function endereco()
    {
        return $this->morphOne(Endereco::class, 'enderecoable');
    }
}
