<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\ProductoModel;
use sisVentas\VendedorModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Http\Requests\ProductoRequest;
use DB;

class ProductoController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    	if($request){
    		$query = trim($request->get('searchText'));
    		$productos = DB::table('Producto')
    				->where('Nombre','LIKE',$query.'%')
    				->orderBy('idProducto','desc')
    				->paginate(7);
			return view('Almacen.Productos.index',["productos"=>$productos,"searchText"=>$query]);

    	}
    }

    public function create(){
        $vendedores = DB::table('Vendedor')->get();
    	return view("Almacen.Productos.Create",["vendedores"=>$vendedores]);
    }

    public function store(ProductoRequest $request){
    	$productoM = new ProductoModel;
        $productoM->fk_idVendedor = $request->get('fk_vendedor');
        $productoM->Nombre = $request->get('nombre');
        $productoM->Descripcion = $request->get('descripcion');
        $peso = $request->get('peso');
        $productoM->Peso = $peso;
        $costo = $request->get('precioCosto');
        $productoM->PrecioCosto = $costo;

        //CALCULANDO PRECIO DE VENTA
        $seguro = 0.07;
        $iva = 0.12;
        $precioEnvio = 3.55;
        $final = $peso * $precioEnvio;
        $final = $final + $costo;  
        $final = $final + ($costo * $seguro);
        $final = $final + ($iva * $final);

        $productoM->PrecioVenta = round($final,2);

        //VERIFICAMOS SI SUBIO IMAGEN
        if(input::hasFile('imagen')){
            $file = Input::file('imagen');
            //MOVEMOS IMAGEN A LA CARPETA IMAGENES/PRODUCTOS
            $file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
            $productoM->Imagen = $file->getClientOriginalName();
        }
        $productoM->save();
    	return Redirect::to('Almacen/Productos');
    }

    public function show($id){
        $producto = ProductoModel::findOrFail($id);
        $vendedor = VendedorModel::findOrFail($producto->fk_idVendedor);
    	return view("Almacen.Productos.show",["producto"=>$producto,"vendedor"=>$vendedor]);
    }

    public function edit($id){
        $vendedores = DB::table('Vendedor')->get();
    	return view("Almacen.Productos.edit",["producto"=>ProductoModel::findOrFail($id),"vendedores"=>$vendedores]);
    }

    public function update(ProductoRequest $request, $id){
    	$productoM = ProductoModel::findOrFail($id);
    	$productoM->fk_idVendedor = $request->get('fk_vendedor');
        $productoM->Nombre = $request->get('nombre');
        $productoM->Descripcion = $request->get('descripcion');
        $peso = $request->get('peso');
        $productoM->Peso = $peso;
        $costo = $request->get('precioCosto');
        $productoM->PrecioCosto = $costo;

        //CALCULANDO PRECIO DE VENTA
        $seguro = 0.07;
        $iva = 0.12;
        $precioEnvio = 3.55;
        $final = $peso * $precioEnvio;
        $final = $final + $costo;  
        $final = $final + ($costo * $seguro);
        $final = $final + ($iva * $final);

        $productoM->PrecioVenta = round($final,2);

        //VERIFICAMOS SI SUBIO IMAGEN
        if(input::hasFile('imagen')){
            $file = Input::file('imagen');
            //MOVEMOS IMAGEN A LA CARPETA IMAGENES/PRODUCTOS
            $file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
            $productoM->Imagen = $file->getClientOriginalName();
        }
        
    	$productoM->update();
    	return Redirect::to('Almacen/Productos');
    }

    public function destroy($id){
        $productoM = ProductoModel::findOrFail($id);
        $productoM->delete();
        return Redirect::to('Almacen/Productos');
    }
}
