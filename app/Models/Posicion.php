<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posicion extends Model
{
    //
    protected $table = 'posiciones';
    public $timestamps = false;
    protected $fillable = [
        'idProducto',
        'idEmpresa',
        'fechaEntregaInicio',
        'moneda',
        'precio',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }
}
