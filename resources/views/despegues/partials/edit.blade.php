{!! Form::model($despegue, ['url' =>action('DespegueController@update', ["Despegues"=>$despegue->id, "aterrizaje"=>$despegue->aterrizaje_id]), "method" => "PUT", "class"=>"form-horizontal"]) !!}
    @include('despegues.partials.form', ["disabled"=>""])
{!! Form::close() !!}




@section('script')
<script>

//Función que comprueba que no existen campos sin llenar al momento de enviar el formulario.
function camposVacios() {
	var flag=true;
	$('#fecha-datepicker, #hora, #aeronave_id, tipoMatricula_id').each(function(index, value){
		if($(value).val()=='')
			flag&=false;
	});
	if(flag==false){
		$('#save-aterrizaje-btn').attr('disabled','disabled');
	}else{
		$('#save-aterrizaje-btn').removeAttr('disabled');
	}
}

$(document).ready(function(){

		$('body #aeronave_id-modal').chosen({width:'135px'});
		$('body #puerto_id-modal').chosen({width:'300px'});
		$('body #piloto_id-modal').chosen({width:'300px'});

    /* 
		Condiciones en los campos de los formularios
		*/

		$('#aterrizajeForm-div input').keyup(function()
		{
			camposVacios();
		});

		$('#aterrizajeForm-div select').change(function()
		{
			camposVacios();	
		});

    /*
    	Fecha
    	*/
    	var d= new Date();
    	var today=$.datepicker.formatDate('d/m/yy', new Date());
    	var h=d.getHours();
    	var m=d.getMinutes();
    	var s=d.getSeconds();
    	if (m<'10'){
    		m='0'+m;
    	}
    	var time=h+':'+m+':'+s;


	/*
		Campos Automáticos.

		*/

		$('body').delegate('.aeronave', 'change', function() {
			var option       =$(this).find('option:selected');
			var modelo       =$(this).closest('form').find('.modeloAeronave');
			var peso       =$(this).closest('form').find('.pesoAeronave');
			var modeloHidden =$(this).closest('form').find('.modeloAeronaveHidden');
			var cliente      =$(this).closest('form').find('.cliente');
			var tipo_vuelo   =$(this).closest('form').find('.tipo_vuelo');
			var nacionalidad   =$(this).closest('form').find('.nacionalidad');
			if ($(option).val() == ''){
				$(modelo).val('').attr('disabled', 'disabled');
				$(peso).val('').attr('disabled', 'disabled');
				$(tipo_vuelo).val('').attr('disabled', 'disabled');
				$(cliente).val('').attr('disabled', 'disabled');
			}else{
				var modelo_aeronave =$(option).data('nombremodelo');
				var peso_aeronave =$(option).data('peso');
				var modelo_id       =$(option).data('modelo');       
				$(modeloHidden).val(modelo_id);
				$(modelo).val(modelo_aeronave);
				$(peso).val(peso_aeronave);

				var tipo=$(option).data('tipo');        
				$(tipo_vuelo).val(tipo).removeAttr('disabled');

				var cliente_id=$(option).data('cliente');        
				$(cliente).val(cliente_id).removeAttr('disabled');
			}               
		});

		$('body').delegate('.piloto', 'change', function() {
			var option =$(this).find('option:selected');
			var cedula =$(this).closest('form').find('.piloto_ci');
			if ($(option).val() == ''){
				$(cedula).val('').attr('disabled', 'disabled');
			}else{
				var cedula_piloto=$(option).data('ci');
				$(cedula).val(cedula_piloto).removeAttr('disabled');
			}               
		});

		$('body').delegate('.puerto', 'change', function() {
			var option    =$(this).find('option:selected');
			var nacionalidad =$(this).closest('form').find('.nacionalidad');

			if ($(option).val() == ''){
				$(nacionalidad).val('').attr('disabled', 'disabled');
			}else{
				var nac_vuelo=$(option).data('nacionalidad');
				if (nac_vuelo == '232'){
					$(nacionalidad).val('1');
				}else{
					$(nacionalidad).val('2');
				}
			}               
		});

	/*
		Datepicker
		*/

		$('#fecha-datepicker-modal').datepicker({
			closeText: 'Cerrar',
			prevText: '&#x3C;Ant',
			nextText: 'Sig&#x3E;',
			currentText: 'Hoy',
			monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
			'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
			'Jul','Ago','Sep','Oct','Nov','Dic'],
			dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
			dayNamesMin: ['D','L','M','M','J','V','S'],
			weekHeader: 'Sm',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: '',
			dateFormat: 'yy-mm-dd'});


});

</script>

@endsection