@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Productos <a href="Productos/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('Almacen.Productos.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12s">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Precio de Venta ($)</th>
						<th>Imagen</th>
						<th>Opciones</th>
					</thead>
					@foreach($productos as $pro)
					<tr>
						<td>{{$pro->Nombre}}</td>
						<td>{{$pro->Descripcion}}</td>
						<td>{{$pro->PrecioVenta}}</td>
						<td>
							<img src="{{asset('imagenes/productos/'.$pro->Imagen)}}" alt="{{$pro->Nombre}}" height="100px" width="100px" class="img-thumbnail">
						</td>
						<td>
							<a href="{{URL::action('ProductoController@edit',$pro->idProducto)}}"><button class="btn btn-warning">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$pro->idProducto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							<a href="{{URL::action('ProductoController@show',$pro->idProducto)}}"><button class="btn btn-info">Detalle</button></a>
						</td>
					</tr>
					@include('Almacen.Productos.modal')
					@endforeach
				</table>
			</div>
			{{$productos->render()}}
		</div>
	</div>
@endsection