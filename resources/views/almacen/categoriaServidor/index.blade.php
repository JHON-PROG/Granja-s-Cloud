
@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Categorias de Servidor <a href="categoriaServidor/create"><button class="btn btn-success">Nuevo</button></a></h3>
    @include('almacen.categoriaServidor.search')


	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
         <thead>
					<th>Cod. Categoria</th>
					<th>Tipo DoCategoria</th>
					<th>Estado</th>

				</thead>
               @foreach($categoria_servidor as $cat)
				<tr>
					<td>{{$cat->codigoCategoriaServidor}}</td>
					<td>{{$cat->nombreCategoriaServidor}}</td>
					<td>@if($cat->estadoCategoriaServidor == 1)
					      Activo
						@else
						  Inactivo
						@endif </td>

					<td>
						<a href="{{URL::action('CategoriaServidorController@edit',$cat->codigoCategoriaServidor)}}"><button class="btn btn-info">Editar</button></a>
                        
				@if($cat->estadoCategoriaServidor == 1)
					<a href="" data-target="#modal-delete-{{$cat->codigoCategoriaServidor}}" data-toggle="modal"><button class="btn btn-danger">Bloquear</button></a>
					@include('almacen.categoriaServidor.modal')
				@else
					<a href="" data-target="#modal-delete-{{$cat->codigoCategoriaServidor}}" data-toggle="modal"><button class="btn btn-success">Activar</button></a>
					@include('almacen.categoriaServidor.modalacti')
					
				@endif
				</td>
				</tr>
				
				@endforeach


			</table>
		</div>
		{{$categoria_servidor->render()}}
	</div>
</div>

@endsection
