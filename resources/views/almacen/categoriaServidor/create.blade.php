@extends ('layouts.admin')
@section ('contenido')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Nueva Categoria de Servidor</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!! Form::open(array('url'=>'almacen/categoriaServidor','method'=>'POST','autocomplete'=>'off'))!!}
		{{form::token()}}

     <div class="form-group">
     	<label for="nombreCategoriaServidor">Tipo de Categoria</label>
     	<input type="text" name="nombreCategoriaServidor" class="form-control" required placeholder="Nombre Categoria...">
     </div>



     <div class="form-group">
     	<button class="btn btn-primary" type="submit">Guardar</button>
		<a href="{{url('almacen/categoriaServidor')}}" type="reset" class="btn btn-danger">Cancaelar</a>
     </div>

	{{Form::close()}}

 	</div>
 </div>
@endsection
