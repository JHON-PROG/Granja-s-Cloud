@extends ('layouts.admin')
@section('contenido')


 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Editar Categoria: {{$categoria->nombre}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif



      {{Form::open(array('action'=>array('CategoriaController@update',$categoria->idcategoria),'method'=>'patch'))}}
     <div class="form-group">
     	<label for="nombre">Nombre</label>
     	<input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}" placeholder="Nombre...">
     </div>

     <div class="form-group">
     	<label for="descripcion">Descripcion</label>
     	<input type="text" name="descripcion" class="form-control" value="{{$categoria->descripcion}}" placeholder="Descripción...">
     </div>

     <div class="form-group">
     	<button class="btn btn-primary" type="submit"  >Actualizar</button>
     	<button class="btn btn-danger" type="reset">Cancelar</button>
     </div>

	  {{Form::close()}}

 </div>
</div>
@endsection
