<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    protected $tabla = 'Producto';
    protected $primatyKey = 'idProducto';
    public $timesTamp = false;
    protected $fillable = [
    	'fk_idVendedor',
    	'Nombre',
    	'Peso',
    	'Descripcion',
    	'PrecioCosto',
    	'PrecioVenta'
    ];
    protected $guarded = [];
}
