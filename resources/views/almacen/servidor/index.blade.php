@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Servidores <a href="servidor/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.servidor.search')

	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				    <th>Cod Servidor</th>
					<th>Nombre</th>
					<th>Ip Interna</th>
					<th>Ip Externa</th>
					<th>Es Cluster</th>
					<th>Categoria</th>
					<th>Servidor P.</th>
					<th>Estado</th>

				</thead>
               @foreach ($servidor as $ser)
				<tr>
					<td>{{$ser->codigoServidor}}</td>
					<td>{{$ser->nombreServidor}}</td>
					<td>{{$ser->ipInterna}}</td>
					<td>{{$ser->ipExterna}}</td>
					<td>
					   @if($ser->esCluster == 1)
					      SI
						@else
						  NO
						@endif 
					</td>
					<td>{{$ser->nombreCategoriaServidor}}</td>
					<td>{{$ser->servidorPadre}}</td>
					<td>@if($ser->estadoServidor == 1)
					      Activo
						@else
						  Inactivo
						@endif </td>
					
					<td>
					
				<a href="{{URL::action('ServidorController@edit',$ser->ipInterna)}}"><button class="btn btn-info">Editar</button></a>
				
				@if($ser->estadoServidor == 1)
					<a href="" data-target="#modal-delete-{{$ser->ipInterna}}" data-toggle="modal"><button class="btn btn-danger">Bloquear</button></a>
					@include('almacen.servidor.modal')
				@else
					<a href="" data-target="#modal-delete-{{$ser->ipInterna}}" data-toggle="modal"><button class="btn btn-success">Activar</button></a>
					@include('almacen.servidor.modalacti')
					
				@endif
				</td>
				</tr>
				
				@endforeach

			</table>
		</div>
		{{$servidor->render()}}
	</div>
</div>
@endsection
