<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasPlanoCliente extends Model
{
    protected $fillable = [
        'plano_id',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
