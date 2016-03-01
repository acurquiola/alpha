<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TasaController extends Controller {

    public function taquilla(){
        return view('tasas.taquilla');
    }


	public function getOperacion(Request $request){
        $aeropuertoId=session('aeropuerto')->id;
        $fecha=$request->get('fecha');
        $taquilla=$request->get('taquilla');
        $turno=$request->get('turno');
        $tasaOp=\App\Tasaop::firstOrCreate([
                'aeropuerto_id' => $aeropuertoId,
                'fecha' => $fecha,
                'taquilla' => $taquilla,
                'turno' => $turno,
            ]);
        $series=["A", "B", "C", "D"];
        foreach($series as $value){
            $series[$value]=\DB::table('tasaopdetalles')->where('serie', $value)->max('fin')+1;
        }
        return view('tasas.partials.taquillaForm', compact('tasaOp', 'fecha', 'taquilla', 'turno', 'series'));
    }

}
