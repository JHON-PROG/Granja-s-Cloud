@extends ('layouts.admin')
@section('contenido')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Editar Usuario: {{$usuarios->name}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

      {{Form::open(array('action'=>array('UserController@update',$usuarios->id),'method'=>'patch'))}}

	  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre Usuario</label>

                            <div class="form-group">
                                <input id="name" type="text" class="form-control" name="name" value="{{$usuarios->name}}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" value="{{$usuarios->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Nueva Password</label>

                            <div class="form-group">
                                <input id="password" type="password" class="form-control" value="{{$usuarios->password}}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Nueva Password</label>

                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" value="{{$usuarios->password}}" name="password_confirmation" required>
                            </div>
                        </div>

     <div class="form-group">
     	<button class="btn btn-primary" type="submit" >Actualizar</button>
		 <a href="{{url('almacen/categoriaServidor')}}" type="reset" class="btn btn-danger">Cancaelar</a>
     </div>

	  {{Form::close()}}

 </div>
</div>
@endsection
