<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Traits\DecimalConverterTrait;
use Illuminate\Http\Request;


class ConciliacionController extends Controller {

    use DecimalConverterTrait;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if($request->ajax()){


			$sortName             = $request->get('sortName','fecha_conciliacion');
			$sortName             =($sortName=="")?"fecha_conciliacion":$sortName;
			
			$sortType             = $request->get('sortType','ASC');
			$sortType             =($sortType=="")?"ASC":$sortType;
			
			$fecha_conciliacion = $request->get('fecha_conciliacion');
			$fecha_banco        = $request->get('fecha_banco');

			if($fecha_conciliacion == ""){
				$fecha_conciliacion = "0000-00-00";
			}else{
				$fecha_conciliacion            =\Carbon\Carbon::createFromFormat('d/m/Y', $fecha_conciliacion);
				$fecha_conciliacion            = $fecha_conciliacion->toDateString();
			}
			if($fecha_banco == ""){
				$fecha_banco = "0000-00-00";
			}else{
				$fecha_banco            =\Carbon\Carbon::createFromFormat('d/m/Y', $fecha_banco);
				$fecha_banco            = $fecha_banco->toDateString();
			}

			$monto_lote        = $request->get('monto_lote');
			$monto_lote        =($monto_lote=="")?0:$monto_lote;
			
			$monto_banco       = $request->get('monto_banco');
			$monto_banco       =($monto_banco=="")?0:$monto_banco;
			
			$comision_bancaria = $request->get('comision_bancaria');
			$comision_bancaria =($comision_bancaria=="")?0:$comision_bancaria;

			\Input::merge([
				'sortName'=>$sortName,
				'sortType'=>$sortType]);

			$conciliados= \App\Conciliado::where('monto_lote', ($monto_lote==0)?'>':'=', $monto_lote)
							->where('monto_banco', ($monto_banco==0)?'>':'=', $monto_banco)
							->where('comision_bancaria', ($comision_bancaria==0)?'>':'=', $comision_bancaria)
							->where('fecha_conciliacion', ($fecha_conciliacion=='0000-00-00')?'>':'=', $fecha_conciliacion)
							->where('fecha_banco', ($fecha_banco=='0000-00-00')?'>':'=', $fecha_banco);

			$totalConciliados = $conciliados->count();
			$conciliados=$conciliados->orderBy($sortName, $sortType)
							 ->paginate(7);

			return view('conciliacion.partials.table', compact('conciliados', 'totalConciliados'));
		}
		else{
				$conciliados         = \App\Conciliado::all();

			return view("conciliacion.index", compact('conciliados'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $movimientos=$request->get('movimientos');
        dd($movimientos);
		foreach ($movimientos as $movimiento) {

			$cobros = explode(',', $movimiento['cobros']);
			$ids    = explode(',', $movimiento['movimientos']);
			$mov    = new \App\Conciliado();


			$fecha_conciliacion      =\Carbon\Carbon::createFromFormat('d/m/Y', $movimiento["fecha_conciliacion"]);
			$fecha_conciliacion      = $fecha_conciliacion->toDateString();
			$fecha_banco             =\Carbon\Carbon::createFromFormat('d/m/Y', $movimiento["fecha_banco"]);
			$fecha_banco             = $fecha_banco->toDateString();

			$mov->fecha_conciliacion =  $fecha_banco;
			$mov->fecha_banco        =  $fecha_conciliacion;
			$mov->monto_lote         =  $this->parseDecimal($movimiento["monto_lote"]);
			$mov->monto_banco        =  $this->parseDecimal($movimiento["monto_banco"]);
			$mov->comision_bancaria  =  $this->parseDecimal($movimiento["comision_bancaria"]);

			if($mov->save()){
				foreach ($cobros as $index => $c) {
					$cobro = \App\Cobro::find($c);
					$cobro->conciliado_id = $mov->id;
					$cobro->save();
				}

				foreach ($ids as $index => $id){
					$m = \App\Cobrospago::find($id);
					$m->update(['conciliado' => true]);
				}


            return ["success" => 1, "text" => 'Conciliación guardada exitósamente.'];
	        }else{
	            return ["success" => 0, "text"=>'Ocurrió un error generar la conciliación.'];
	        }
		}


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cobros = \App\Cobro::where('conciliado_id', $id)->get();
		
        if(\App\Conciliado::destroy($id)){

        	foreach ($cobros as $cobro) {
				$cobro->conciliado_id = null;
				$cobro->save();

				foreach ($cobro->pagos as $pago) {
					$pago->conciliado = false;
					$pago->save();
				}
			}
            return ["success"=>1, "text" => "Registro eliminado exitósamente."];
        }else{
            return ["success"=>0, "text" => "Error eliminando el registro."];
        }
	}

	public function getMovimientos(Request $request)
	{
		if(count($request->all()) != 0){

			$anno         = $request->get('anno', \Carbon\Carbon::now()->year);
			$banco_id     = $request->get('banco_id');
			$cuenta_id    = $request->get('cuenta_id');
			$tipo         = $request->get('tipo');
			$ncomprobante = $request->get('ncomprobante');
			$cobro_id     = $request->get('cobro_id');
			$fecha_inicio = $request->get('fecha_inicio');
			$fecha_fin    = $request->get('fecha_fin');
	        $today=\Carbon\Carbon::now();

			$movimientosCobros  = \App\Cobrospago::nombrebanco($banco_id)
											->numerocuenta($cuenta_id)
											->anno($anno)
											->tipo($tipo)
											->referencia($ncomprobante)
											->cobro($cobro_id)
											->conciliado()
											->fecha($fecha_inicio, $fecha_fin);
			$movimientosCobros = $movimientosCobros->orderBy('fecha', 'ASC')->get();
			if($cobro_id == ''){
				$movimientosTasas = \App\TasaCobroDetalle::nombrebanco($banco_id)
												->numerocuenta($cuenta_id)
												->anno($anno)
												->tipo($tipo)
												->referencia($ncomprobante)
												->conciliado()
												->fecha($fecha_inicio, $fecha_fin);	
			}

			//$movimientos = array_merge($movimientosCobros, $movimientosTasas);
			//dd($movimientos);

											//dd($movimientosTasas->toSql(), $movimientosTasas->getBindings());
			$movimientosTasas = $movimientosTasas->orderBy('fecha', 'ASC')->get();

			$movimientos = $movimientosCobros->merge($movimientosTasas);
		}else{
			$anno         = $request->get('anno', \Carbon\Carbon::now()->year);
			$banco_id     = $request->get('banco_id');
			$cuenta_id    = $request->get('cuenta_id');
			$tipo         = $request->get('tipo');
			$ncomprobante = $request->get('ncomprobante');
			$cobro_id     = $request->get('cobro_id');
			$fecha_inicio = $request->get('fecha_inicio');
			$fecha_fin    = $request->get('fecha_fin');
	        $today=\Carbon\Carbon::now();
			$movimientos = collect([]);
		}

		return view('conciliacion.listMovimientos', compact('movimientos', 'movimientosTasas', 'anno', 'banco_id', 'cuenta_id', 'tipo', 'ncomprobante', 'cobro_id', 'fecha_inicio', 'fecha_fin', 'today'));
	}

}
