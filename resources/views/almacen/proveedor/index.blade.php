
@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Proveedores <a href="proveedor/create"><button class="btn btn-success">Nuevo</button></a></h3>
    @include('almacen.proveedor.search')


	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
         <thead>
					<th>Nit</th>
					<th>Razon Social</th>
					<th>Celular</th>
					<th>Ciudad</th>
					<th>Direccion</th>
					<th>Email</th>
				</thead>
               @foreach($proveedores as $pro)
				<tr>
					<td>{{$pro->nit}}</td>
					<td>{{$pro->razonsocial}}</td>
					<td>{{$pro->celular}}</td>
					<td>{{$pro->ciudad}}</td>
					<td>{{$pro->direccion}}</td>
					<td>{{$pro->email}}</td>
					<td>
						<a href="{{URL::action('ProveedorController@edit',$pro->nit)}}"><button class="btn btn-info">Editar</button></a>
            <a href="" data-target="#modal-delete-{{$pro->nit}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
        @include('almacen.proveedor.modal')
				@endforeach

			</table>
		</div>
		{{$proveedores->render()}}
	</div>
</div>

@endsection
