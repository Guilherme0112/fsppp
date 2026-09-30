<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
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
