
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$cat->codigoCategoriaServidor}}">

	{{Form::open(array('action'=>array('CategoriaServidorController@destroy',$cat->codigoCategoriaServidor),'method'=>'delete'))}}

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dissmiss="modal" arial-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Categorioa de Servidor</h4>
			</div>

			<div class="modal-body">
				<p>Confirme Si Desea Eliminar la Categorioa de Servidor</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
       {{Form::Close()}}

</div>