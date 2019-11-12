@extends ('layouts.admin')
@section ('contenido')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Nuevo Proveedor</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!! Form::open(array('url'=>'almacen/proveedor','method'=>'POST','autocomplete'=>'off'))!!}
		{{form::token()}}

     <div class="form-group">
     	<label for="descripcion">Nit del Proveedor</label>
     	<input type="text" name="nit" class="form-control" placeholder="Nit...">
     </div>

     <div class="form-group">
     	<label for="descripcion">Razon Social</label>
     	<input type="text" name="razonsocial" class="form-control" placeholder="Razon Social...">
     </div>

     <div class="form-group">
     	<label for="descripcion">Celular</label>
     	<input type="text" name="celular" class="form-control" placeholder="Celular...">
     </div>

     <div class="form-group">
     	<label for="descripcion">Ciudad</label>
     	<input type="text" name="ciudad" class="form-control" placeholder="Ciudad...">
     </div>

     <div class="form-group">
     	<label for="descripcion">Direccion</label>
     	<input type="text" name="direccion" class="form-control" placeholder="Direccion...">
     </div>

     <div class="form-group">
     	<label for="nombre">Email</label>
     	<input type="text" name="email" class="form-control" placeholder="Email...">
     </div>

     <div class="form-group">
     	<button class="btn btn-primary" type="submit">Guardar</button>
     	<button class="btn btn-danger" type="reset">Cancelar</button>
     </div>

	{{Form::close()}}

 	</div>
 </div>
@endsection
