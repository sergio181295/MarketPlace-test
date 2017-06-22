@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"></div>
		<h3>Listado de Productos <a href="Producto/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('Almacen.Productos.search')
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Peso</th>
						<th>Descripcion</th>
						<th>PrecioCosto</th>
						<th>PrecioVenta</th>
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
							<a href=""><button class="btn btn-info">Editar</button></a>
							<a href=""><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
			{{$productos->render()}}
		</div>
	</div>
@endsection