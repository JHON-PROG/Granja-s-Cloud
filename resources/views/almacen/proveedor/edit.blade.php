
@extends ('layouts.admin')
@section('contenido')


 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Editar Producto:  {{$proveedores->razonsocial}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

      {{Form::open(array('action'=>array('ProveedorController@update',$proveedores->nit),'method'=>'patch'))}}
      
      <div class="form-group">
       <label for="descripcion">Razon Social</label>
       <input type="text" name="razonsocial" class="form-control" value="{{$proveedores->razonsocial}}"  placeholder="Razon Social...">
      </div>

      <div class="form-group">
       <label for="descripcion">Celular</label>
       <input type="text" name="celular" class="form-control" value="{{$proveedores->celular}}" placeholder="Celular...">
      </div>

      <div class="form-group">
       <label for="descripcion">Ciudad</label>
       <input type="text" name="ciudad" class="form-control" value="{{$proveedores->ciudad}}" placeholder="Ciudad...">
      </div>

      <div class="form-group">
       <label for="descripcion">Direccion</label>
       <input type="text" name="direccion" class="form-control" value="{{$proveedores->direccion}}" placeholder="Direccion...">
      </div>

      <div class="form-group">
       <label for="nombre">Correo</label>
       <input type="text" name="email" class="form-control" value="{{$proveedores->email}}" placeholder="Correo...">
      </div>

      <div class="form-group">
      	<button class="btn btn-primary" type="submit"  >Actualizar</button>
      	<button class="btn btn-danger" type="reset">Cancelar</button>
      </div>

	  {{Form::close()}}

 </div>
</div>
@endsection
