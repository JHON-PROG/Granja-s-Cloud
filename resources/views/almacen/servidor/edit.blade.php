@extends ('layouts.admin')
@section('contenido')


 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Editar Servidor: {{$servidor->nombreServidor}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif



      {{Form::open(array('action'=>array('ServidorController@update',$servidor->ipInterna),'method'=>'patch'))}}

       
      <div class="form-group" style="display: none">
       <label for="codigoServidor"></label>
       <input type="text" name="codigoServidor" class="form-control"required value="{{$servidor->codigoServidor}}">
      </div>

	  <div class="form-group" style="display: none">
       <label for="ipInterna"></label>
       <input type="text" name="ipInterna" class="form-control" value="{{$servidor->ipInterna}}">
      </div>

      <div class="form-group">
       <label for="nombreServidor">Nombre Servidor</label>
       <input type="text" name="nombreServidor" class="form-control" required value="{{$servidor->nombreServidor}}">
      </div>

	  <div class="form-group">
       <label for="ipExterna">Ip Externa</label>
       <input type="text" name="ipExterna" class="form-control"required value="{{$servidor->ipExterna}}">
      </div>

	  <div class="form-group">
       <label for="esCluster">Es Cluster</label>
       <input type="text" name="esCluster" class="form-control"required value="{{$servidor->esCluster}}">
      </div>

	  <div class="form-group">
       <label for="categoria">Categoria</label>
       <input type="text" name="categoria" class="form-control"required value="{{$servidor->categoria}}">
      </div>

	  <div class="form-group">
       <label for="servidorPadre">Servidor Padre</label>
       <input type="text" name="servidorPadre" class="form-control" required value="{{$servidor->servidorPadre}}">
      </div>

       
     <div class="form-group">
     	<button class="btn btn-primary" type="submit" >Actualizar</button>
     <a href="{{url('almacen/servidor')}}" type="reset" class="btn btn-danger">Cancaelar</a>
     </div>

	  {{Form::close()}}

 </div>
</div>
@endsection
