@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.cliente.search')

	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
			     	<th>Cod. Cliente</th>
					<th>Nit</th>
					<th>Razon Social</th>
					<th>Nombre Comerial</th>
					<th>Contacto</th>
					<th>Estado</th>
					
					
				</thead>
               @foreach ($cliente as $cli)
				<tr>
				    <td>{{$cli->codCliente}}</td>
					<td>{{$cli->nit}}</td>
					<td>{{$cli->razonSocial}}</td>
					<td>{{$cli->nombreComercial}}</td>
					<td>{{$cli->contacto}}</td>
					<td>@if($cli->estadoCliente == 1)
					      Activo
						@else
						  Inactivo
						@endif </td>
					
					<td>
					
					
					<td>
						<a href="{{URL::action('ClienteController@edit',$cli->nit)}}"><button class="btn btn-info">Editar</button></a>
						
				@if($cli->estadoCliente == 1)
					<a href="" data-target="#modal-delete-{{$cli->nit}}" data-toggle="modal"><button class="btn btn-danger">Bloquear</button></a>
					@include('almacen.cliente.modal')
				@else
					<a href="" data-target="#modal-delete-{{$cli->nit}}" data-toggle="modal"><button class="btn btn-success">Activar</button></a>
					@include('almacen.cliente.modalacti')
					
				@endif
				</td>
				</tr>
				
				@endforeach

			</table>
		</div>
		{{$cliente->render()}}
	</div>
</div>
@endsection
