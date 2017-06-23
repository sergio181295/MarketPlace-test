<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class VendedorModel extends Model
{
    protected $table = 'Vendedor';
    protected $primaryKey = 'idVendedor';
    public $timestamps = false;
    protected $fillable = [
    	'Nombre',
    	'Apellido',
    	'Email'
    ];
    protected $guarded = [];
}

