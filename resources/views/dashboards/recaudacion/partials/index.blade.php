@extends('app')
@section('content')
<section class="content-header" style="margin-bottom: 20px">
	<h1>
		<i class="ion-speedometer"></i> Dashboard
		<small><b><i class="ion ion-android-calendar"></i> {{$today->format('d/m/Y')}}</b></small>
>
	</h1>
</section>

@include('dashboards.recaudacion.partials.resumenRelacionRecaudacionMeta') 
@include('dashboards.recaudacion.partials.facturasRecientes') 

@endsection
@section('script')
<script>
	$(function(){
		
		$('#export-btn').click(function(e){
			var table=$('table').clone();
			$(table).find('td, th').filter(function() {
				return $(this).css('display') == 'none';
			}).remove();
			$(table).find('tr').filter(function() {
				return $(this).find('td,th').length == 0;
			}).remove();
			$(table).prepend('<thead>\
								<tr>\
									<th colspan="4" style="vertical-align: middle; margin-top:20px" align="center" class="text-center"> RESUMEN DE RECAUDACIÓN Y META</th>\
								</tr>\
							</thead>')
			$(table).find('thead, th').css({'border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '7px'})
			$(table).find('th').css({'border-bottom':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '7px'})
			$(table).find('td').css({'font-size': '6px'})
			$(table).find('tr:nth-child(even)').css({'border-bottom':'1px solid black'})
			var tableHtml= $(table)[0].outerHTML;
			$('[name=table]').val(tableHtml);
			$('#export-form').submit();
		})
	})

</script>
@endsection