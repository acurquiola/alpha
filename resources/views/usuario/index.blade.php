@extends('app')
@section('content')
 <div class="row">
 	<section class="col-lg-12">

 		<!-- Tabla de despegues-->
 		<div class="nav-tabs-custom">           
 			<div class="box box-info">
 				<div class="box-header with-border">
 					<h3 class="box-title"><span class="ion ion-people-stalker"></span> Usuarios Registrados</h3>
 					<div class="box-tools pull-right">
 						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
 						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
 					</div>
 				</div><!-- /.box-header -->
 				<div class="box-body">
 					<div class="table-responsive">
 						<table id='user-table' class="table no-margin">
 							<thead>
 								<tr>
 									<th>Nombre de Usuario</th>
 									<th>Nombre y Apellido</th>
 									<th>Departamento</th>
 									<th>Cargo</th>
 									<th>Tipo de Usuario</th>
 									<th>Opciones</th>
 								</tr>
 							</thead>
 							<tbody>
 							</tbody>
 						</table>
 					</div><!-- /.table-responsive -->
 				</div><!-- /.box-body -->
 				<div class="overlay">
 					<i class="fa fa-refresh fa-spin"></i>
 				</div>
 			</div><!-- /.box -->
 		</div><!-- /.col -->
 	</section>

 	<section class="col-lg-7">

 		<!-- Formulario de Registro -->
 		<div id="userForm-div" class="box box-info">
 			<div class="box-header">
 				<h3 class="box-title">Registro de Usuario</h3>
 			</div>
 			<div class="box-body">
 			<div class="input-group">
 				<span class="input-group-addon">@</span>
 				<input type="text" class="form-control" placeholder="Nombre de Usuario" id="username-input">
 			</div>
 			<br/>
 			<div class="input-group">
 				<span class="input-group-addon"><i class="ion ion-locked"></i></span>
 				<input type="text" class="form-control" placeholder="Contraseña" id="password-input">
 			</div>
 			<br/>
 			<div class="input-group">
 				<span class="input-group-addon"><i class="ion ion-locked"></i></span>
 				<input type="text" class="form-control" placeholder="Repetir Contraseña" id="password2-input">
 			</div>
 			<br/>
 			<div class="input-group">
 				<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 				<input type="text" class="form-control" placeholder="Nombre y Apellido" id="fullname-input">
 			</div>
 			<br/>
 			<div class="input-group">
 				<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 				<div class="form-group">
 					<select class="form-control" id="aeropuerto_id-select">
 						<option value="">Seleccione el Aeropuerto</option>
 						@foreach ($aeropuertos as $aeropuerto)
 						<option value="{{$aeropuerto->id}}"> {{$aeropuerto->nombre}}</option>
 						@endforeach
 					</select>
 				</div>
 			</div>
 			<br/>
 			<div class="input-group">
 				<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 				<div class="form-group">
 					<select class="form-control" id="departamento_id-select">
 						<option value="">Seleccione el Departamento</option>
 						@foreach ($departamentos as $departamento)
 						<option value="{{$departamento->id}}"> {{$departamento->nombre}}</option>
 						@endforeach
 					</select>
 				</div>
 			</div>
 			<br/>
 			<div class="input-group">
 				<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 				<div class="form-group">
 					<select class="form-control" id="cargo_id-select">
 						<option value="">Seleccione el Cargo</option>
 						@foreach ($cargos as $cargo)
 						<option value="{{$cargo->id}}"> {{$cargo->nombre}}</option>
 						@endforeach
 					</select>
 				</div>
 			</div>
 			<br/>
 			<div class="input-group">
 				<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 				<input type="text" class="form-control" placeholder="Directo" id="directo-input">
 			</div>
 			<br/>
 			<div class="input-group">
 				<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 				<input type="text" class="form-control" placeholder="Email" id="email-input">
 			</div>
 			<br/>
 			<div class="form-group">
 				<div class="checkbox">
 					<label>
 						<input id="estado-check" type="checkbox" checked name="activo" > Activo
 					</label>
 				</div>
 			</div>
 			<br/>
 		</div><!-- /.box-body -->
 		<div class="box-footer" align="right">
 			<button class="btn btn-primary" type="submit" id="save-user-btn" disabled> Registrar </button>
 		</div><!-- ./box-footer -->
 	</div><!-- /.box -->


 	<!-- Modal -->
 	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 		<div class="modal-dialog">
 			<div class="modal-content">
 				<div class="modal-header" id="titulo-div-modal">
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 					<h4 class="modal-title" id="titulo-modal">Información de Usuario</h4>
 				</div>

 				<div class="modal-body">
 					<input type="hidden" id="id-input-modal" >
 				<div class="input-group">
 					<span class="input-group-addon">@</span>
 					<input type="text" class="form-control" placeholder="Nombre de Usuario" id="username-input-modal">
 				</div>
 				<br/>

 				<div class="input-group">
 					<span class="input-group-addon"><i class="ion ion-locked"></i></span>
 					<input type="text" class="form-control" placeholder="Contraseña" id="password-input-modal">
 					<br/>
 				</div>

 			<div class="input-group">
 				<span class="input-group-addon"><i class="ion ion-locked"></i></span>
 				<input type="text" class="form-control" placeholder="Repetir Contraseña" id="password2-input-modal">
 				<br/>
 			</div>

 		<div class="input-group">
 			<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 			<input type="text" class="form-control" placeholder="Nombre y Apellido" id="fullname-input-modal">
 		</div>
 		<br/>
 		<div class="input-group">
 			<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 			<div class="form-group">
 				<select class="form-control" id="aeropuerto_id-select-modal">
 					<option value="">Seleccione el Aeropuerto</option>
 					@foreach ($aeropuertos as $aeropuerto)
 					<option value="{{$aeropuerto->id}}"> {{$aeropuerto->nombre}}</option>
 					@endforeach
 				</select>
 			</div>
 		</div>
 		<br/>
 		<div class="input-group">
 			<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 			<div class="form-group">
 				<select class="form-control" id="departamento_id-select-modal">
 					<option value="">Seleccione el Departamento</option>
 					@foreach ($departamentos as $departamento)
 					<option value="{{$departamento->id}}"> {{$departamento->nombre}}</option>
 					@endforeach
 				</select>
 			</div>
 		</div>
 		<br/>
 		<div class="input-group">
 			<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 			<div class="form-group">
 				<select class="form-control" id="cargo_id-select-modal">
 					<option value="">Seleccione el Cargo</option>
 					@foreach ($cargos as $cargo)
 					<option value="{{$cargo->id}}"> {{$cargo->nombre}}</option>
 					@endforeach
 				</select>
 			</div>
 		</div>
 		<br/>
 		<div class="input-group">
 			<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 			<input type="text" class="form-control" placeholder="Directo" id="directo-input-modal">
 		</div>
 		<br/>
 		<div class="input-group">
 			<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
 			<input type="text" class="form-control" placeholder="Email" id="email-input-modal">
 		</div>
 		<br/>
 		<div class="form-group">
 			<div class="checkbox">
 				<label>
 					<input id="estado-check-modal" type="checkbox" checked name="activo" > Activo
 				</label>
 			</div>
 		</div>


 	</div>
 	<div class="modal-footer">
 		<div id="info-btn-div-modal" style="display:none">

 			<button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
 		</div>
 		<div id="editar-btn-div-modal" style="display:none">
 			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
 			<button id="save-user-btn-modal" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
 		</div>
 	</div>
 </div>
</div>
</div>
</section>
</div><!-- /.row (main row) -->
@endsection
@section('script')
<script>

//Función que contiene el formato de las filas de la tabla.
function constructorFila(usuario) {

	var estado=usuario.estado;
	var fila="<tr data-id='"+usuario.id+"'>\
				<td class='username-td'>"+usuario.username+"</td>\
				<td class='fullname-td'>"+usuario.fullname+"</td>\
				<td class='departamento_id-td'>"+((usuario.departamento)?usuario.departamento.nombre:"")+"</td>\
				<td class='cargo_id-td'>"+((usuario.grupo)?usuario.cargo.nombre:"")+"</td>\
				<td class='grupo_id-td'>"+((usuario.roles.length>0)?usuario.roles[0].name:"No posee asignado")+"</td>\
				<td>\
					<button class='btn "+((estado==1)?"btn-primary":"btn-default")+" btn-sm activarUsuario-btn'><i class='glyphicon glyphicon-adjust' title='"+((estado==1)?"Usuario Habilitado":"Usuario Inhabilitado")+"'></i></button>\
					<button class='btn btn-info btn-sm verUsuario-btn'><i class='glyphicon glyphicon-zoom-in' title='Ver usuario'></i></button>\
					<button class='btn btn-warning btn-sm editarUsuario-btn'><i class='glyphicon glyphicon-pencil' title='Editar Información'></i></button>\
					<button class='btn btn-danger  btn-sm eliminarUsuario-btn'><i class='glyphicon glyphicon-trash' title='Eliminar Usuario'></i></button>\
				</td>\
			</tr>";
	return fila;
}

//Función que comprueba que no existen campos sin llenar al momento de enviar el formulario.
function camposVacios() {
	var flag=true;
	$('#userForm-div input[type="text"], #userForm-div select').each(function(index, value){
		if($(value).val()=='')
			flag&=false;
	});
	if(flag==false){
		$('#save-user-btn').attr('disabled','disabled');
	}else{
		$('#save-user-btn').removeAttr('disabled');
	}
}



$(document).ready(function(){

/*Traer filas de la bd

*/


$.ajax({
	method:'POST',
	url:'{{action("UsuarioController@store")}}'})
.always(function(text, status, responseObject){
	try{
		var listado =JSON.parse(responseObject.responseText);
		var fila    = '';
		$(listado).each(function(index, value){
			var estado = value.estado;
			fila       +=constructorFila(value);
		})
		$('#user-table tbody').html(fila);
		$('.overlay').remove();
	}catch (e){
		console.log(e);
		alertify.error("Error recibiendo la información del servidor")

	}

})


/*


Botones de las filas


*/
	// Botón para habilitar/inhabilitar
	$('#user-table').delegate('.activarUsuario-btn', 'click', function(){
		var fila =  $(this).closest('tr');
		var id   =  $(fila).data('id');

		// confirm dialog
		alertify.confirm("¿Realmente desea  cambiar el estado a este usuario?", function (e) {
			if (e) {		

				$.ajax({
					data:{id:id},
					method:'get',
					url:'{{action("UsuarioController@estadoUser")}}'})
				.always(function(text, status, responseObject){
					try{
						var respuesta=JSON.parse(responseObject.responseText);
						if(respuesta.success==1){
							if (respuesta.usuario.estado==0){
								console.log(respuesta.usuario.estado);
								$(fila).find('.activarUsuario-btn')
								.removeClass('btn-primary')
								.addClass('btn-default')
								.prop('title', 'Usuario Inhabilitado');

							}
							else if (respuesta.usuario.estado==1){

								console.log(respuesta.usuario.estado);
								$(fila).find('.activarUsuario-btn')
								.addClass('btn-primary')
								.removeClass('btn-default')
								.prop('title', 'Usuario Habilitado');								
							}
							alertify.success(respuesta.text);

						}
						else
						{
							alertify.error(respuesta.text);
						}
						
					}catch (e){
						console.log(e);
						alertify.error("Error procensando la información del servidor")

					}

				})
			} 
		});

});


 	// Botón para ver la información del Usuario
 	$('#user-table').delegate('.verUsuario-btn', 'click', function(){
 		var fila =  $(this).closest('tr');
 		var id   =  $(fila).data('id');
 		console.log(id);

 		$.ajax({
 			data:{id:id},
 			method:'get',
 			url:'{{action("UsuarioController@show")}}'})
 		.always(function(text, status, responseObject){
 			try{
 				var respuesta=JSON.parse(responseObject.responseText);
 				if(respuesta.success==1){

 					$('#username-input-modal').val(respuesta.usuario.username).attr('readonly', 'readonly');
 					$('#fullname-input-modal').val(respuesta.usuario.fullname).attr('readonly', 'readonly');
 					$('#departamento_id-select-modal').val(respuesta.usuario.departamento_id).attr('disabled', 'disabled');
 					$('#cargo_id-select-modal').val(respuesta.usuario.cargo_id).attr('disabled', 'disabled');
 					$('#directo-input-modal').val(respuesta.usuario.directo).attr('readonly', 'readonly');
 					$('#email-input-modal').val(respuesta.usuario.email).attr('readonly', 'readonly');
 					if (respuesta.usuario.estado==1){
 						$('#estado-check-modal').prop('checked', true).iCheck('update').attr('disabled', 'disabled');
 					}else if (respuesta.usuario.estado==0){						
 						$('#estado-check-modal').prop('checked', false).iCheck('update').attr('disabled', 'disabled');
 					};
 					$('#aeropuerto_id-select-modal').val(respuesta.usuario.aeropuerto_id).attr('readonly', 'readonly');
 					$('#password-input-modal, #password2-input-modal').closest('.input-group').hide();
 					$('#info-btn-div-modal').show();
 					$('#editar-btn-div-modal').hide();
 					$('#titulo-modal').html('Información del Usuario');
 					$('#myModal').modal('toggle');	
 				}
 				else
 				{
 					alertify.error(respuesta.text);
 				}

 			}catch (e){
 				console.log(e);
 				alertify.error("Error procensando la información del servidor")

 			}

 		})

});


 	// Botón para editar la información del Usuario
 	$('#user-table').delegate('.editarUsuario-btn', 'click', function(){
 		var fila =  $(this).closest('tr');
 		var id   =  $(fila).data('id');
 		console.log(id);

 		$.ajax({
 			data:{id:id},
 			method:'get',
 			url:'{{action("UsuarioController@show")}}'})
 		.always(function(text, status, responseObject){
 			try{
 				var respuesta=JSON.parse(responseObject.responseText);
 				if(respuesta.success==1){
 					$('#id-input-modal').val(respuesta.usuario.id);

 					$('#username-input-modal').val(respuesta.usuario.username);
 					$('#fullname-input-modal').val(respuesta.usuario.fullname);
 					$('#departamento_id-select-modal').val(respuesta.usuario.departamento_id);
 					$('#cargo_id-select-modal').val(respuesta.usuario.cargo_id);
 					$('#directo-input-modal').val(respuesta.usuario.directo);
 					$('#email-input-modal').val(respuesta.usuario.email);
 					$('#aeropuerto_id-select-modal').val(respuesta.usuario.aeropuerto_id);
 					if (respuesta.usuario.estado==1){
 						$('#estado-check-modal').prop('checked', true).iCheck('update');
 					}else if (respuesta.usuario.estado==0){						
 						$('#estado-check-modal').prop('checked', false).iCheck('update');
 					};
 					$('#password-input-modal, #password2-input-modal', '#').closest('.input-group').hide();
 					$('#editar-btn-div-modal').show();
 					$('#info-btn-div-modal').hide();					
 					$('#titulo-modal').html('Editar Información del Usuario');
 					$('#myModal').modal('toggle');	
 				}
 				else
 				{
 					alertify.error(respuesta.text);
 				}

 			}catch (e){
 				console.log(e);
 				alertify.error("Error procensando la información del servidor")

 			}

 		})

});


	// Botón para eliminar
	$('#user-table').delegate('.eliminarUsuario-btn', 'click', function(){
		var fila =  $(this).closest('tr');
		var id   =  $(fila).data('id');

		// confirm dialog
		alertify.confirm("¿Realmente desea eliminar a este usuario?", function (e) {
			if (e) {		

				$.ajax({
					data:{id:id},
					method:'delete',
					url:'{{action("UsuarioController@destroy")}}'})
				.always(function(text, status, responseObject){
					try{
						var respuesta=JSON.parse(responseObject.responseText);
						if(respuesta.success==1){
							$(fila).remove();
							alertify.success(respuesta.text);

						}
						else
						{
							alertify.error(respuesta.text);
						}
						
					}catch (e){
						console.log(e);
						alertify.error("Error procensando la información del servidor")

					}

				})
			} 
		});

	});


	//Modal
	$('#myModal').on('hidden.bs.modal', function (e) {
		$('#myModal input, #myModal select').removeAttr('disabled').removeAttr('readonly').val('');		
	});

	
	$('#userForm-div input[type="text"]').keyup(function(){
		camposVacios();
		
	});
	$('#userForm-div select').change(function(){
		camposVacios();

	});



	$('#save-user-btn-modal').click(function(){


		var data             ={};
		data.id      		 =$('#id-input-modal').val();
		data.username        =$('#username-input-modal').val();
		data.fullname        =$('#fullname-input-modal').val();
		data.departamento_id =$('#departamento_id-select-modal').val();
		data.cargo_id        =$('#cargo_id-select-modal').val();
		data.directo         =$('#directo-input-modal').val();
		data.email           =$('#email-input-modal').val();
		data.password 		 =$('#password-input-modal').val();
		data.estado          =$('#estado-check-modal').prop('checked');
		data.aeropuerto_id   =$('#aeropuerto_id-select-modal').val();

		console.log(data);

		$.ajax({data:data,
			method:'get',
			url:'{{action("UsuarioController@edit")}}'})
		.always(function(text, status, responseObject){

			try{
				var respuesta=JSON.parse(responseObject.responseText);
				if(respuesta.success==1){
					var fila=$('#user-table tbody tr[data-id="'+data.id+'"]');
					$(fila).find('.username-td').html(data.username);
					$(fila).find('.fullname-td').html(data.fullname);
					$(fila).find('.departamento_id-td').html(respuesta.usuario.departamento.nombre);
					$(fila).find('.cargo_id-td').html(respuesta.usuario.cargo.nombre);
					if (respuesta.usuario.estado==1){
						$(fila).find('.activarUsuario-btn')
						.removeClass('btn-default')
						.addClass('btn-primary')
						.prop('title', 'Usuario Habilitado');
					}else if (respuesta.usuario.estado==0){	
						$(fila).find('.activarUsuario-btn')
						.removeClass('btn-primary')
						.addClass('btn-default')
						.prop('title', 'Usuario Inhabilitado');
					}

					alertify.success(respuesta.text);		
				}
				else
				{
					alertify.error(respuesta.text);
				}

			}catch (e){
				console.log(e);
				alertify.error("Error procensando la información del servidor")

			}
		})
})

 $('#save-user-btn').click(function(){

 	var data             ={};

 	data.username        =$('#username-input').val();
 	data.password        =$('#password-input').val();
 	data.fullname        =$('#fullname-input').val();
 	data.departamento_id =$('#departamento_id-select').val();
 	data.cargo_id        =$('#cargo_id-select').val();
 	data.directo         =$('#directo-input').val();
 	data.email           =$('#email-input').val();
 	data.estado          =$('#estado-check').prop('checked');
 	data.aeropuerto_id   =$('#aeropuerto_id-select').val();

 	var overlay= "<div class='overlay'>\
 	<i class='fa fa-refresh fa-spin'></i>\
 	</div>";

 	$('#userForm-div').append(overlay);

 	$.ajax({data:data,
 		method:'get',
 		url:'{{action("UsuarioController@create")}}'})
 	.always(function(text, status, responseObject){
 		$('#userForm-div .overlay').remove();

 		try{
 			var respuesta=JSON.parse(responseObject.responseText);
 			console.log(respuesta);
 			if(respuesta.success==1){
 				var value= respuesta.usuario;
 				var fila=constructorFila(value);
 				$('#user-table tbody').prepend(fila);	
 				$('#userForm-div input[type="text"], #userForm-div select').val('');
 				$('#save-user-btn').attr('disabled','disabled');
 				alertify.success(respuesta.text);		
 			}
 			else
 			{
 				alertify.error(respuesta.text);
 			}

 		}catch (e){
 			console.log(e);
 			alertify.error("Error procensando la información del servidor")

 		}
 	})
 })
})



 </script>

@endsection