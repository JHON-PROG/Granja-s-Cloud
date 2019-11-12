@extends('layouts.admin')

@section('header')
	<h1>
		Nueva venta
	</h1>
@endsection

@section('contenido')

	<div class="row">
		<div class="col-md-12 col-xs-12">
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<form action="/almacen/venta" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

				<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h4 class="text-left text-primary">CODIGO DE VENTA: {{$ventas}}</h4>
</div>
          <!-- <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="form-group">
              <label for="COD VENTA">CODIGO DE VENTA</label>
              <input type="text" name="codventa" class="form-control" placeholder="codventa" value="{{ old('codventa') }}">
            </div>
          </div> -->



				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="Cliente">CLIENTE</label>
						<select name="codcliente" id="codcliente" class="form-control selectpicker" data-live-search="true">
							@foreach($clientes as $cliente)
							<option value="{{ $cliente->numero_doc }}">
								{{ $cliente->clientes }}
							</option>
							@endforeach
						</select>
					</div>
				</div><!-- fin col-md-3 -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="FORMA DE PAGO">FORMA DE PAGO</label>
						<select name="Formadepago" class="form-control">
							<option value="Efectivo">Factura</option>
							<option value="TARJETA">Ticket</option>
						</select>
					</div>
				</div><!-- fin col-md-3 -->

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="Vendedor">VENDEDOR</label>
					<select name="codvendedor" id="codvendedor" class="form-control selectpicker" data-live-search="true">
						@foreach($empleados as $empleado)
						<option value="{{ $empleado->numero_doc }}">
							{{ $empleado->empleados }}
						</option>
						@endforeach
					</select>
				</div>
					</div><!-- fin col-md-3 -->
					
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="FECHA">FECHA</label>
						<input type="date" name="fecha" class="form-control" placeholder="fecha" value="{{ old('fecha') }}" required>
					</div>
				</div><!-- fin col-md-3 -->

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="VALOR NETO">VALOR NETO</label>
            <input type="text" name="vrneto" class="form-control" placeholder="vrneto" value="{{ old('vrneto') }}">
          </div>
        </div><!-- fin col-md-4 -->


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="IMPUESTO">IMPUESTO</label>
            <input type="text" name="impuesto" class="form-control" placeholder="impuesto" value="{{ old('impuesto') }}">
          </div>
        </div><!-- fin col-md-4 -->

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="DESCUENTO">DESCUENTO</label>
            <input type="text" name="descuento" class="form-control" placeholder="descuento" value="{{ old('descuento') }}">
          </div>
        </div><!-- fin col-md-4 -->



      </div><!-- fin row cabecera -->

				<div class="row">
					<div class="panel panel-body panel-primary">
						<div class="col-md-4">
							<div class="form-group">
								<label for="articulo">Artículo</label>
							<select name="pid_articulo" id="pid_articulo" class="form-control selectpicker" data-live-search="true">
									@foreach($productos as $producto)
									<option value="{{ $producto->procodigo }}_{{ $producto->proprecio_venta }}">
										{{ $producto->productos }}
									</option>
									@endforeach
							</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="pcantidad">Cantidad</label>
								<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="pprecio_compra">Valor unitario</label>
								<input type="number" name="pprecio_compra" disabled id="pprecio_compra" class="form-control" placeholder="Precio venta">
							</div>
						</div>
						<!-- <div class="col-md-2">
							<div class="form-group">
								<label for="pprecio_venta">Valor total</label>
								<input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="Precio Venta">
							</div>
						</div> -->
						<div class="col-md-2">
							<div class="form-group">
								<button type="button" id="bt_add" class="btn btn-primary">
									Agregar
								</button>
							</div>
						</div>

						<div class="col-md-12">
							<table id="detalles" class="table table-striped table-bordered table-hover table-condensed" style="margin-top: 10px">
								<thead style="background-color: #A9D0F5">
									<th>Opciones</th>
									<th>Artículo</th>
									<th>Cantidad</th>
									<th>Precio Unitario</th>
									<th>SubTotal</th>

								</thead>
								<tfoot>
									<th>TOTAL</th>
									<th></th>
									<th></th>
									<th></th>
									<th><h4 id="total">0.00</h4></th>
								</tfoot>
								<tbody>

								</tbody>
							</table>
						</div>

					</div><!-- panel-body -->
				</div><!-- fin row detalle -->

				<div class="row">
				<div class="col-md-12" id="guardar">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">
							Guardar
						</button>
					</div>
				</div>
				</div><!-- fin row buttons -->
			</form>

		</div>
	</div>

@push('scripts')
<script>

	$(document).ready(function(){
		$("#bt_add").click(function(){
			agregar();
		});
	});

	var cont = 0;
	var total = 0;
	var subtotal = [];

	//Cuando cargue el documento
	//Ocultar el botón Guardar
	$("#guardar").hide();
	$("#pid_articulo").change(mostravalores);

	function mostravalores(){

		datosArticulo=document.getElementById('pid_articulo').value.split('_');
		$("#pprecio_compra").val(datosArticulo[1]);
	}

	function agregar(){

		//Obtener los valores de los inputs

		//
		datosArticulo=document.getElementById('pid_articulo').value.split('_');
		cod_producto=datosArticulo[0];
		// cod_producto = $("#pid_articulo").val();
		articulo = $("#pid_articulo option:selected").text();
		cantidad = $("#pcantidad").val();
		vr_unitario = $("#pprecio_compra").val();
		vr_total = $("#pprecio_venta").val();

		//Validar los campos
		if(cod_producto != "" && cantidad > 0 && vr_unitario != "" && vr_total != ""){

			//subtotal array inicie en el indice cero
			subtotal[cont] = (cantidad * vr_unitario);
			total = total + subtotal[cont];

			var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="cod_producto[]" value="'+cod_producto+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="vr_unitario[]" value="'+vr_unitario+'"></td><td><input type="number" name="total[]" value="'+subtotal[cont]+'"></td></tr>';

			cont++;
			limpiar();
			$("#total").html("$" + total);
			evaluar();
			$("#detalles").append(fila);
		}else{
			alert("Error al ingresar el detalle del ingreso, revise los datos del artículo");
		}
	}

	function limpiar(){
		$("#pcantidad").val("");
		$("#pprecio_compra").val("");
		$("#pprecio_venta").val("");
	}

	//Muestra botón guardar
	function evaluar(){
		if(total > 0){
			$("#guardar").show();
		}else{
			$("#guardar").hide();
		}
	}

	function eliminar(index){
		total = total-subtotal[index];
		$("#total").html("$" + total);
		$("#fila" + index).remove();
		evaluar();
	}

</script>
@endpush
@endsection
