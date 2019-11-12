@extends ('layouts.admin')
@section('contenido')


 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Editar Cliente: {{$cliente->razonSocial}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif



      {{Form::open(array('action'=>array('ClienteController@update',$cliente->nit),'method'=>'patch'))}}
       
    <div class="form-group"  style="display: none">
     <label for="nit">Nit</label>
     <input type="text" name="nit" class="form-control" required value="{{$cliente->nit}}">
    </div>

    <div class="form-group">
     <label for="razonSocial">Razon Social</label>
     <input type="text" name="razonSocial" class="form-control"required value="{{$cliente->razonSocial}}" >
    </div>

     <div class="form-group">
     	<label for="nombreempleado">Nombre Comercial</label>
     	<input type="text" name="nombreComercial" class="form-control"required value="{{$cliente->nombreComercial}}">
     </div>

     <div class="form-group">
     	<label for="contacto">Contacto</label>
     	<input type="text" name="contacto" class="form-control"required value="{{$cliente->contacto}}">
     </div>


     <div class="form-group">
     	<button class="btn btn-primary" type="submit" >Actualizar</button>
     	<button class="btn btn-danger" type="reset">Cancelar</button>
     </div>

	  {{Form::close()}}

 </div>
</div>
@endsection
