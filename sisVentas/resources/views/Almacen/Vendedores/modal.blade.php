<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-vendedor-{{$ven->idVendedor}}">
	{{form::Open(array('action'=>array('VendedorController@destroy',$ven->idVendedor),'method'=>'DELETE'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Vendedor</h4>
			</div>
			<div class="modal-body">
				<p>Dese eliminar al vendedor/a {{$ven->Nombre}}?</p>
			</div>
			<div class="modal.footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Eliminar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>