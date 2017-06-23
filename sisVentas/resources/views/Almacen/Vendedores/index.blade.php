@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Vendedores <a href="Vendedores/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('Almacen.Vendedores.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Email</th>
						<th>Opciones</th>
					</thead>
					@foreach($vendedores as $ven)
					<tr>
						<td>{{$ven->idVendedor}}</td>
						<td>{{$ven->Nombre}}</td>
						<td>{{$ven->Apellido}}</td>
						<td>{{$ven->Email}}</td>
						<td>
							<a href="{{URL::action('VendedorController@edit',$ven->idVendedor)}}"><button class="btn btn-warning">Editar</button></a>
							<a href="" data-target="#modal-delete-vendedor-{{$ven->idVendedor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('Almacen.Vendedores.modal')
					@endforeach
				</table>
			</div>
			{{$vendedores->render()}}
		</div>
	</div>
@endsection