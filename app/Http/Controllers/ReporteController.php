<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ReporteController extends Controller {

	public function getReporteMensual(Request $request){
        $mes=$request->get('mes', \Carbon\Carbon::now()->month);
        $anno=$request->get('anno',  \Carbon\Carbon::now()->year);

        $modulos=\App\Modulo::where('aeropuerto_id', session('aeropuerto')->id )->get();
        $montos=[];
        $montosTotales=[];
        $primerDiaMes=\Carbon\Carbon::create($anno, $mes,1)->startOfMonth();
        $ultimoDiaMes=\Carbon\Carbon::create($anno, $mes,1)->endOfMonth();
        for(;$primerDiaMes<=$ultimoDiaMes; $primerDiaMes->addDay()){
            $montos[$primerDiaMes->format('d/m/Y')]=[];
            foreach($modulos as $modulo){
                $montos[$primerDiaMes->format('d/m/Y')][$modulo->id]=\DB::table('facturas')
                    ->join('facturadetalles','facturas.id' , '=', 'facturadetalles.factura_id')
                    ->join('conceptos','conceptos.id' , '=', 'facturadetalles.concepto_id')
                    ->where('conceptos.modulo_id', "=",$modulo->id)
                    ->where('facturas.fecha', $primerDiaMes)->sum('facturas.total');
                if(!isset($montosTotales[$modulo->id]))
                    $montosTotales[$modulo->id]=0;
                $montosTotales[$modulo->id]+=($montos[$primerDiaMes->format('d/m/Y')][$modulo->id]);
            }
        }
        return view('reportes.reporteDiario', compact('modulos', 'montos', 'montosTotales','mes','anno'));

    }

}
