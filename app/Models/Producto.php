<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';
    public $timestamps = false;

    public function posiciones()
    {
        return $this->hasMany(Posicion::class, 'idProducto');
    }
}
