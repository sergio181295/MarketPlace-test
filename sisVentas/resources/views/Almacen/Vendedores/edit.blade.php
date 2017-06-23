@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
		<h3>Editar Vendedor: {{$vendedor->Nombre}}</h3>
		@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::model($vendedor,['method'=>'PATCH','route'=>['Vendedores.update',$vendedor->idVendedor]])!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{$vendedor->Nombre}}" placeholder="Nombre">
		</div>
		<div class="form-group">
			<label for="apellido">Apellido</label>
			<input type="text" name="apellido" class="form-control" value="{{$vendedor->Apellido}}" placeholder="0">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" class="form-control" value="{{$vendedor->Email}}" placeholder="Email">
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{URL::action('VendedorController@index')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
		</div>
		{!!Form::close()!!}
	</div>
@endsection