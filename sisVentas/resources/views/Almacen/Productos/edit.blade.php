@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Producto: {{$producto->Nombre}}</h3>
			@if(count($errors)>0)
				<div class="alert alert-danger">
					<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
			@endif

			{!!Form::model($producto,['method'=>'PATCH','route'=>['Productos.update',$producto->idProducto]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="vendedor">Id Vendedor</label>
				<select name="fk_vendedor" class="form-control">
					@foreach($vendedores as $ven)
						@if($ven->idVendedor==$producto->fk_idVendedor)
							<option value="{{$ven->idVendedor}}" selected>{{$ven->Nombre}}</option>
						@else
							<option value="{{$ven->idVendedor}}">{{$ven->Nombre}}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$producto->Nombre}}" placeholder="Nombre">
			</div>
			<div class="form-group">
				<label for="peso">Peso</label>
				<input type="text" name="peso" class="form-control" value="{{$producto->Peso}}" placeholder="0">
			</div>
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" class="form-control" value="{{$producto->Descripcion}}" placeholder="Descripcion">
			</div>
			<div class="form-group">
				<label for="precioCosto">Precio de Costo</label>
				<input type="text" name="precioCosto" class="form-control" value="{{$producto->PrecioCosto}}" placeholder="0">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="{{URL::action('ProductoController@index')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection