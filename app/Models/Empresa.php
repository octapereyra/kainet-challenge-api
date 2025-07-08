<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $table = 'empresas';
    public $timestamps = false;

    public function posiciones()
    {
        return $this->hasOne(Posicion::class, 'idEmpresa');
    }
}
