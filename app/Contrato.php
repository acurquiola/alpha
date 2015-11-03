<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model {

    protected $guarded = array();

    public function setFechaInicioAttribute($fecha)
    {
        $this->attributes['fechaInicio']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }
    public function getFechaInicioAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" )
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', $fecha);
        return $carbon->format('d/m/Y');
    }
    public function setFechaVencimientoAttribute($fecha)
    {
        $this->attributes['fechaVencimiento']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }
    public function getFechaVencimientoAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" )
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', $fecha);
        return $carbon->format('d/m/Y');
    }

    public function concepto()
    {
        return $this->belongsTo('App\Concepto');
    }
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
