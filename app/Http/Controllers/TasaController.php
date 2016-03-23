<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TasaController extends Controller {

    public function taquilla(){
        $aeropuerto=session('aeropuerto');
        return view('tasas.taquilla', compact('aeropuerto'));
    }


	public function getOperacion(Request $request){
        $aeropuerto=session('aeropuerto');
        $aeropuertoId=$aeropuerto->id;
        $fecha=$request->get('fecha');
        $taquilla=$request->get('taquilla');
        $turno=$request->get('turno');
        $tasaOp=\App\Tasaop::where([
            'aeropuerto_id' => $aeropuertoId,
            'fecha' => \Carbon\Carbon::createFromFormat('d/m/Y', $fecha)->format('Y-m-d'),
            'taquilla' => $taquilla,
            'turno' => $turno,
        ])->first();
        if(!$tasaOp){
            $tasaOp= \App\Tasaop::create([
                'aeropuerto_id' => $aeropuertoId,
                'fecha' => \Carbon\Carbon::createFromFormat('d/m/Y', $fecha)->format('Y-m-d'),
                'taquilla' => $taquilla,
                'turno' => $turno,
            ]);
        }
        $tasaOp->load('detalles');

        $tasas=$aeropuerto->tasas;
        foreach($tasas as $tasa){
            $tasa->max=\DB::table('tasaopdetalles')->where('serie', $tasa->nombre)->max('fin')+1;
        }
        return view('tasas.partials.taquillaForm', compact('tasaOp', 'fecha', 'taquilla', 'turno', 'tasas', 'aeropuerto'));
    }

    public function postOperacion(Request $request){
        $aeropuertoId=session('aeropuerto')->id;
        $fecha=$request->get('fecha');
        $taquilla=$request->get('taquilla');
        $turno=$request->get('turno');
        $tasaOp=\App\Tasaop::where([
            'aeropuerto_id' => $aeropuertoId,
            'fecha' => \Carbon\Carbon::createFromFormat('d/m/Y', $fecha)->format('Y-m-d'),
            'taquilla' => $taquilla,
            'turno' => $turno,
        ])->first();
        $tasaOp->detalles()->delete();
        $detalles=$request->only('serie', 'desde', 'hasta', 'cantidad', 'monto');
        if(isset($detalles['serie']))
            foreach($detalles['serie'] as $serieIndex => $serie){
                $tasaOp->detalles()->create([
                    "serie" => $serie,
                    "inicio" => $detalles['desde'][$serieIndex],
                    "fin" => $detalles['hasta'][$serieIndex],
                    "costo" => $detalles['monto'][$serieIndex],
                    "cantidad" => $detalles['cantidad'][$serieIndex],
                    "total" => $detalles['monto'][$serieIndex] * $detalles['cantidad'][$serieIndex],
                ]);
            }

    }
}
