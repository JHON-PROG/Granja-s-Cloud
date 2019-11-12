
@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios <a href="usuario/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('almacen.usuario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
         <thead>
				    <th>Id</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Fecha de Creacion</th>
					<th>Estado</th>

				</thead>
               @foreach($usuarios as $us)
				<tr>
				    <td>{{$us->id}}</td>
					<td>{{$us->name}}</td>
					<td>{{$us->email}}</td>
					<td>{{$us->created_at}}</td>
					<td>@if($us->estadoUser == 1)
					      ACTIVO
						@else
						  INACTIVO
						@endif </td>

					<td>
					<a href="{{URL::action('UserController@edit',$us->id)}}"><button class="btn btn-info">Editar</button></a>
				
				@if($us->estadoUser == 1)
					<a href="" data-target="#modal-delete-{{$us->id}}" data-toggle="modal"><button class="btn btn-danger">Bloquear</button></a>
					@include('almacen.usuario.modal')
				@else
					<a href="" data-target="#modal-delete-{{$us->id}}" data-toggle="modal"><button class="btn btn-success">Activar</button></a>
					@include('almacen.usuario.modalacti')
					
				@endif
				</td>
				</tr>
				
				@endforeach


			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>

@endsection
