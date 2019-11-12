@extends ('layouts.admin')
@section('contenido')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Nuevo Cliente</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!! Form::open(array('url'=>'almacen/cliente','method'=>'POST','autocomplete'=>'off'))!!}
		{{form::token()}}
		
    <div class="form-group">
     <label for="nit">Nit</label>
     <input type="text" name="nit" class="form-control" required placeholder="nit...">
    </div>

    <div class="form-group">
     <label for="razonSocial">Razon Social</label>
     <input type="text" name="razonSocial" class="form-control" required placeholder="Razon Social...">
    </div>

     <div class="form-group">
     	<label for="nombreempleado">Nombre Comercial</label>
     	<input type="text" name="nombreComercial" class="form-control"required placeholder="Nombre Comercial...">
     </div>

     <div class="form-group">
     	<label for="contacto">Contacto</label>
     	<input type="text" name="contacto" class="form-control"required placeholder="Contacto...">
     </div>

     

     <div class="form-group">
     	<button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{url('almacen/clientes')}}" class="btn btn-danger">Cancelar</a>
     </div>

	{{Form::close()}}

 	</div>
 </div>

@endsection
