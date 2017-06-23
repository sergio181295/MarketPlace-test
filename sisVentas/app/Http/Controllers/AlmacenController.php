<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class AlmacenController extends Controller
{
    public function __construct(){

    }

    public function index(){
		return view('Almacen.index');
    }
}
