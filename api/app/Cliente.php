<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['name','email', 'telefone', 'estado', 'cidade', 'dtnascimento'];

    public function planos()
    {
        return $this->hasMany(Plano::class);
    }
}
