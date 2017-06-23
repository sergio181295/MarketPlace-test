<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use sisVentas\VendedorModel;
use sisVentas\Http\Requests\VendedorRequest;
use DB;

class VendedorController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    	if($request){
    		$query = trim($request->get('searchText'));
    		$vendedores = DB::table('Vendedor')
    				->where('Nombre','LIKE',$query.'%')
    				->orwhere('Apellido','LIKE',$query."%")
    				->orderBy('idVendedor','desc')
    				->paginate(7);
			return view('Almacen.Vendedores.index',["vendedores"=>$vendedores,"searchText"=>$query]);

    	}
    }

    public function create(){
    	return view("Almacen.Vendedores.Create");

    }

    public function store(VendedorRequest $request){
    	$vendedorM = new VendedorModel;
        $vendedorM->Nombre = $request->get('nombre');
        $vendedorM->Apellido = $request->get('apellido');
        $vendedorM->Email = $request->get('email');
        $vendedorM->save();
    	return Redirect::to('Almacen/Vendedores');
    }

    public function show($id){
    	return view("Almacen.Vendedores.show",["vendedor"=>VendedorModel::findOrFail($id)]);
    }

    public function edit($id){
    	return view("Almacen.Vendedores.edit",["vendedor"=>VendedorModel::findOrFail($id)]);
    }

    public function update(VendedorRequest $request, $id){
    	$vendedorM = VendedorModel::findOrFail($id);
    	$vendedorM->Nombre = $request->get('nombre');
        $vendedorM->Apellido = $request->get('apellido');
        $vendedorM->Email = $request->get('email');
    	$vendedorM->update();
    	return Redirect::to('Almacen/Vendedores');
    }

    public function destroy($id){
        $vendedorM = VendedorModel::findOrFail($id);
        $vendedorM->delete();
        return Redirect::to('Almacen/Vendedores');
    }
}
