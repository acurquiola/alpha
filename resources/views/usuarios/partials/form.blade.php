<div class="form-group">
	<label for="username" class="col-sm-2 control-label">Username</label>
	<div class="col-sm-10">
		{!! Form::text('username', null, [ 'class'=>"form-control", $disabled, "placeholder"=>"Nombre de Usuario", "maxlength"=>"255"]) !!}

	</div>
</div> 

<div class="form-group">
	<label for="username" class="col-sm-2 control-label">Username</label>
	<div class="col-sm-10">
		{!! Form::text('fullname', null, [ 'class'=>"form-control", $disabled, "placeholder"=>"Nombre y Apellido del Usuario", "maxlength"=>"255"]) !!}

	</div>
</div> 

<div class="form-group" >
	<label for="password" class="col-sm-2 control-label" >Constraseña</label>
	<div class="col-sm-10">
		{!! Form::password('password', null, ['id'=>'password', 'class'=>"form-control", $disabled, "placeholder"=>"Contraseña"]) !!}

	</div>
</div>

<div class="form-group" >
	<label for="passwordrepeat" class="col-sm-2 control-label" >Repetir Contraseña</label>
	<div class="col-sm-10">
		{!! Form::password('passwordrepeat', null, ['id'=>'passwordrepeat', 'class'=>"form-control", $disabled, "placeholder"=>"Vuelva a indicar la contraseña"]) !!}

	</div>
</div>

<div class="form-group">
	<label for="departamento_id" class="col-sm-2 control-label">País</label>
	<div class="col-sm-10">
		{!! Form::select('departamento_id',	$departamentos, null, [ 'class'=>"form-control"]) !!}
	</div>
</div>

<div class="form-group">
	<label for="cargo_id" class="col-sm-2 control-label">País</label>
	<div class="col-sm-10">
		{!! Form::select('cargo_id', $cargos, null, [ 'class'=>"form-control"]) !!}
	</div>
</div>

<div class="form-group" >
	<label for="directo" class="col-sm-2 control-label" >Licencia</label>
	<div class="col-sm-10">
		{!! Form::text('directo', null, [ 'class'=>"form-control", $disabled, "placeholder"=>"Número de Directo"]) !!}

	</div>
</div>

<div class="form-group" >
	<label for="email" class="col-sm-2 control-label" >Licencia</label>
	<div class="col-sm-10">
		{!! Form::text('email', null, [ 'class'=>"form-control", $disabled, "placeholder"=>"Dirección de Correo Electrónico."]) !!}

	</div>
</div>

<div class="form-group">
	<label for="estado" class="col-sm-2 control-label">Estado</label>
	<div class="col-sm-10">
			{!! Form::checkbox('estado', true, null) !!} Activo
	</div>
</div>