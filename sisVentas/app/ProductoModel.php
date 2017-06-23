<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    protected $table = 'Producto';
    protected $primaryKey = 'idProducto';
    public $timestamps = false;
    protected $fillable = [
    	'fk_idVendedor',
    	'Nombre',
    	'Peso',
    	'Descripcion',
    	'PrecioCosto',
    	'PrecioVenta',
        'Imagen'
    ];
    protected $guarded = [];
}
