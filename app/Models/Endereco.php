<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        "logradouro",
        "numero",
        "complemento",
        "bairro",
        "cidade",
        "estado",
        "cep",
    ];

    public function enderecoable()
    {
        return $this->morphTo();
    }
}
