@extends ('layouts.admin')
@section('contenido')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Nuevo Servidor</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif


		{!! Form::open(array('url'=>'almacen/servidor','method'=>'POST','autocomplete'=>'off'))!!}
		{{form::token()}}

      <div class="form-group">
       <label for="nombreServidor">Nombre Servidor</label>
       <input type="text" name="nombreServidor" class="form-control" required="required" placeholder="Cod Servidor ...">
      </div>

	  <div class="form-group" >
       <label for="ipInterna">Ip Interna</label>
       <input type="text" name="ipInterna"  class="form-control"  id="ipInterna" required="required" maxlength="" placeholder="XXXX.XXXX.XXXX.XXXX...">
	  </div>

	  <div class="form-group">
       <label for="ipExterna">Ip Externa</label>
       <input type="text" name="ipExterna" class="form-control" id="ipExterna" required="required" maxlength="4.4.4.4" placeholder="XXXX.XXXX.XXXX.XXXX...">
      </div>

	  <div class="form-group">
			<label for="Categoria">Categoria</label>
				<select name="categoria" id="categoria" class="form-control selectpicker" required="required" data-live-search="true">
				@foreach($categoria_servidor as $cs)
				<option value="{{$cs->codigoCategoriaServidor}}">
					{{$cs->categoria}}
					</option>
					@endforeach
				</select>
		</div>

	   <div class="form-group">
         <label for="esCluster">Es un Cluster</label>
         <input type="text" name="esCluster" class="form-control" required="required" placeholder="1 si / 0 no...">
       </div>

	<input type="text" name="esCluster" class="form-control"  required="required" placeholder="1 si / 0 no...">
	  <div class="form-group" style="display: none">
       <label for="servidorPadre">Servidor Padre</label>
       <input type="text" name="servidorPadre" value="0" class="form-control" placeholder="ip ...">
      </div>
  
	  <div class="form-group" >
       <label for="servidorPadre">Servidor Padre</label>
       <input type="text" name="servidorPadre" class="form-control" placeholder="ip ...">
      </div>


     <div class="form-group">
     	<button class="btn btn-primary" type="submit">Guardar</button>
		<a href="{{url('almacen/servidor')}}" type="reset" required="required" class="btn btn-danger">Cancaelar</a>
     </div>

	 <script>
	 type="text/javascript" src="validarIp.js"
	 </script>

	{{Form::close()}}

 	</div>
 </div>

@endsection
