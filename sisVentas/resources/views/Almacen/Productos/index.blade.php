@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"></div>
		<h3>Listado de Productos <a href="Productos/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('Almacen.Productos.search')
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Peso (Lb)</th>
						<th>Descripcion</th>
						<th>Precio de Costo ($)</th>
						<th>Precio de Venta ($)</th>
						<th>Opciones</th>
					</thead>
					@foreach($productos as $pro)
					<tr>
						<td>{{$pro->idProducto}}</td>
						<td>{{$pro->Nombre}}</td>
						<td>{{$pro->Peso}}</td>
						<td>{{$pro->Descripcion}}</td>
						<td>{{$pro->PrecioCosto}}</td>
						<td>{{$pro->PrecioVenta}}</td>
						<td>
							<a href="{{URL::action('ProductoController@edit',$pro->idProducto)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$pro->idProducto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
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