@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-md-12 col-xs-12">


				<div class="row">


				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="Cliente">CLIENTE</label>
						<p>{{$ventas->nombrecliente}}</p>
					</div>
				</div><!-- fin col-md-3 -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="FORMA DE PAGO">FORMA DE PAGO</label>
						<p>{{$ventas->Forma_De_Pago}}</p>
					</div>
				</div><!-- fin col-md-3 -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="Valor neto">Valor Neto</label>
				<p>{{$ventas->Vr_Neto}}</p>
				</div>
					</div><!-- fin col-md-3 -->

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="Valor Total">Valor Total</label>
					<p>{{$ventas->Vr_Total_A_Pagar}}</p>
					</div>
						</div>

      </div><!-- fin row cabecera -->

				<div class="row">
					<div class="panel panel-body panel-primary">


						<div class="col-md-12">
							<table id="detalles" class="table table-striped table-bordered table-hover table-condensed" style="margin-top: 10px">
								<thead style="background-color: #A9D0F5">

									<th>Artículo</th>
									<th>Cantidad</th>
									<th>Precio Unitario</th>
									<th>SubTotal</th>

								</thead>
								<tfoot>

									<th></th>
									<th></th>
									<th></th>
									<th></th>
								</tfoot>
								<tbody>
										@foreach($detalles as $detal)
										<tr>

											<td>{{$detal->articulo}}</td>
											<td>{{$detal->cantidad}}</td>
											<td>{{$detal->vr_unitario}}</td>
											<td>{{$detal->vr_total}}</td>
										</tr>
										@endforeach


								</tbody>
							</table>
						</div>

					</div><!-- panel-body -->
				</div><!-- fin row detalle -->




		</div>
	</div>

@endsection
