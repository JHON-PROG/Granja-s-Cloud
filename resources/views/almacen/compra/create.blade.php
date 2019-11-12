@extends('layouts.admin')

@section('header')
	<h1>
		Nueva Compra
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

			<form action="/almacen/compra" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

				<div class="row">

          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="form-group">
              <label for="codigo_compra ">CODIGO DE Compra</label>
              <input type="text" name="codigo_compra" class="form-control" placeholder="codigo_compra" value="{{ old('codigo_compra') }}">
            </div>
          </div>



				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="proveedor">Proveedor</label>
						<select name="proveedor" id="proveedor" class="form-control selectpicker" data-live-search="true">
							@foreach($proveedores as $proveedores)
							<option value="{{ $proveedores->nit }}">
								{{ $proveedores->razonsocial }}
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
            <label for="vr_neto_compra">VALOR NETO</label>
            <input type="text" name="vrneto" class="form-control" placeholder="vrneto" value="{{ old('vrneto') }}">
          </div>
        </div><!-- fin col-md-4 -->


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="impuesto_compra">IMPUESTO</label>
            <input type="number" name="impuesto_compra" class="form-control" placeholder="impuesto_compra" value="{{ old('impuesto_compra') }}">
          </div>
        </div><!-- fin col-md-4 -->

			
		<div class="col-md-2">
							<div class="form-group">
								<label for="pimpuesto">impuesto 2</label>
								<input type="number" name="pimpuesto" id="pimpuesto" class="form-control" placeholder="impuesto">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="pdescuento">descuento 2</label>
								<input type="number" name="pdescuento" id="pdescuento" class="form-control" placeholder="descuento">
							</div>
						</div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="descuento_compra">DESCUENTO</label>
            <input type="number" name="descuento_compra" class="form-control" placeholder="descuento_compra" value="{{ old('descuento_compra') }}">
          </div>
        </div><!-- fin col-md-4 -->


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="vr_total_compra">VALOR TOTAL</label>
            <input type="text" name="vr_total_compra" class="form-control" placeholder="vr_total_compra" value="{{ old('vr_total_compra') }}">
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
									<option value="{{ $producto->procodigo }}">
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
								<input type="number" name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="Precio Compra">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="pprecio_venta">Valor total</label>
								<input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="Precio Venta">
							</div>
						</div>

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
									<th>Precio Unittario</th>
									<th>Precio Total</th>

								</thead>
								
								<tbody>

								</tbody>
							<tfoot>
									<th>Total</th>
									<th></th>
									<th></th>
									<th></th>

									<th><h4 id="total">0.00</h4></th>
								</tfoot>
								<tfoot>
									<th>SubTotal</th>
									<th></th>
									<th></th>
									<th></th>

									<th><h4 id="SubTotal">0.00</h4></th>
								</tfoot>
								<tfoot>
									<th>Descuento</th>
									<th></th>
									<th></th>
									<th></th>

									<th><h4 id="Descuento">0.00</h4></th>
								</tfoot>
								
								<tfoot>
									<th>Impuesto</th>
									<th></th>
									<th></th>
									<th></th>

									<th><h4 id="Impuesto">0.00</h4></th>
								</tfoot>
								
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
	var preciototal = [];
	var subtotal=0;
	var descuento=0;
	var impuesto=0;
	var total=0;
	var subtotal2=0;
	//Cuando cargue el documento
	//Ocultar el botón Guardar
	$("#guardar").hide();

	function agregar(){
		//Obtener los valores de los inputs
		cod_producto = $("#pid_articulo").val();
		articulo = $("#pid_articulo option:selected").text();
		cantidad = $("#pcantidad").val();
		vr_unitario = $("#pprecio_compra").val();
		vr_total = $("#pprecio_venta").val();
		descuento_compra=$("#pdescuento").val();
		impuesto_compra=$("#pimpuesto").val();
		//Validar los campos
		if(cod_producto != "" && cantidad > 0 && vr_unitario != "" && vr_total != ""){

			//subtotal array inicie en el indice cero
			preciototal[cont] = (cantidad * vr_unitario);
			subtotal = subtotal + preciototal[cont];
			descuento = subtotal*(descuento_compra/100);
			impuesto =  (subtotal-descuento) * (impuesto_compra/100);
			total = subtotal + impuesto - descuento;

			var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="cod_producto[]" value="'+cod_producto+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="vr_unitario[]" value="'+vr_unitario+'"></td><td><input type="number" name="vr_total[]" value="'+vr_total+'"></td></tr>';

			cont++;
			limpiar();
			$("#SubTotal").html("$" + subtotal);
			$("#Descuento").html("$" + descuento);
			$("#Impuesto").html("$" + impuesto);
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
		subtotal = subtotal-preciototal[index];
		$("#SubTotal").html("$" + subtotal);
		$("#fila" + index).remove();
		evaluar();
	}

</script>
@endpush
@endsection
