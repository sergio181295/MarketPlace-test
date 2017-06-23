@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
		<h3>Nuevo Producto</h3>
		@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::open(array('url'=>'Almacen/Productos','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="vendedor">Id Vendedor</label>
			<select name="fk_vendedor" class="form-control">
				@foreach($vendedores as $ven)
					<option value="{{$ven->idVendedor}}">{{$ven->Nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" placeholder="Nombre">
		</div>
		<div class="form-group">
			<label for="peso">Peso</label>
			<input type="text" name="peso" class="form-control" placeholder="0">
		</div>
		<div class="form-group">
			<label for="descripcion">Descripcion</label>
			<input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
		</div>
		<div class="form-group">
			<label for="precioCosto">Precio de Costo</label>
			<input type="text" name="precioCosto" class="form-control" placeholder="0">
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{URL::action('ProductoController@index')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
		</div>
		{!!Form::close()!!}
	</div>
@endsection