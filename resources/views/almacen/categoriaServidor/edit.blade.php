@extends ('layouts.admin')
@section('contenido')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Editar Categosia de Servidor: {{$categoria_servidor->nombreCategoriaServidor}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

      {{Form::open(array('action'=>array('CategoriaServidorController@update',$categoria_servidor->codigoCategoriaServidor),'method'=>'patch'))}}

	  <div class="form-group" style="display: none">
     	<label for="descripcion">codigoCategoriaServidor</label>
     	<input type="text" name="codigoCategoriaServidor" class="form-control" value="{{$categoria_servidor->codigoCategoriaServidor}}" >
     </div>

     <div class="form-group">
     	<label for="descripcion">tipo Categoria</label>
     	<input type="text" name="nombreCategoriaServidor" class="form-control" required value="{{$categoria_servidor->nombreCategoriaServidor}}" >
     </div>

     <div class="form-group">
     	<button class="btn btn-primary" type="submit" >Actualizar</button>
		 <a href="{{url('almacen/categoriaServidor')}}" type="reset" class="btn btn-danger">Cancaelar</a>
     </div>

	  {{Form::close()}}

 </div>
</div>
@endsection
