@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Detalle del Producto</h3>
			<table class="table table-striped table-bordered table-condensed table-hover">
				<tr>
					<td>ID</td>
					<td>{{$producto->idProducto}}</td>
				</tr>
				<tr>
					<td>Nombre</td>
					<td>{{$producto->Nombre}}</td>
				</tr>
				<tr>
					<td>Peso(lb)</td>
					<td>{{$producto->Peso}}</td>
				</tr>
				<tr>
					<td>Precio de Costo($)</td>
					<td>{{$producto->PrecioCosto}}</td>
				</tr>
				<tr>
					<td>Precio de Venta($)</td>
					<td>{{$producto->PrecioVenta}}</td>
				</tr>
				<tr>
					<td>Descripcion</td>
					<td>{{$producto->Descripcion}}</td>
				</tr>
			</table>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Detalle del vendedor</h3>
			<table class="table table-striped table-bordered table-condensed table-hover">
				<tr>
					<td>ID</td>
					<td>{{$vendedor->idVendedor}}</td>
				</tr>
				<tr>
					<td>Nombre</td>
					<td>{{$vendedor->Nombre}}</td>
				</tr>
				<tr>
					<td>Apellido)</td>
					<td>{{$vendedor->Apellido}}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>{{$vendedor->Email}}</td>
				</tr>
			</table>
		</div>
	</div>
		<a href="{{URL::action('ProductoController@index')}}"><button class="btn btn-primary" type="button">Regresar</button></a>
@endsection