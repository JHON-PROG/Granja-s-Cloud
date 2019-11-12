
@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ventas <a href="venta/create"><button class="btn btn-success">Nuevo</button></a></h3>
    @include('almacen.venta.search')


	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
         <thead>
					<th>Codigo venta</th>
					<th>Cliente</th>

					<th>Fecha</th>
					<th>Forma de pago</th>
					<th>Valor Neto</th>
					<th>Valor total</th>

				</thead>
               @foreach($ventas as $vent)
				<tr>
					<td>{{$vent->Cod_venta}}</td>
					<td>{{ $vent->nombrecliente. ' ' .$vent->apellidocliente}}</td>
					<td>{{$vent->fecha}}</td>
					<td>{{$vent->Forma_De_Pago}}</td>
					<td>{{$vent->Vr_Neto}}</td>
					<td>{{$vent->Vr_Total_A_Pagar}}</td>

					<td>

					<a href="{{URL::action('VentasController@show',$vent->Cod_venta)}}"><button class="btn btn-primary">Detalles</button></a>
            <a href="" data-target="#modal-delete-{{$vent->Cod_venta}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
        @include('almacen.venta.modal')
				@endforeach

			</table>
		</div>
		{{ $ventas->render() }}
	</div>
</div>

@endsection
