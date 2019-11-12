
@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Compras <a href="compra/create"><button class="btn btn-success">Nuevo</button></a></h3>
	@include('almacen.compra.search')	


	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
         <thead>
					<th>Codigo Compra</th>
					<th>Porveedor</th>
					<th>Fecha</th>
					<th>Vr. Neto</th>
					<th>Impuestos</th>
					<th>Valor total Compra</th>

				</thead>
               @foreach($compra as $com)
				<tr>
					<td>{{$com->codigo_compra}}</td>
					<td>{{$com->razonsocial}}</td>
					<td>{{$com->fecha_compra}}</td>
					<td>{{$com->vr_neto_compra}}</td>
					<td>{{$com->impuesto_compra}}</td>
					<td>{{$com->Total}}</td>

					<td>
						<a href="{{URL::action('CompraController@show',$com->codigo_compra)}}"><button class="btn btn-primary">Detalles</button></a>
            <a href="" data-target="#modal-delete-{{$com->codigo_compra}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
					
				@endforeach

			</table>
		</div>
		{{ $compra->render() }}
	</div>
</div>

@endsection
