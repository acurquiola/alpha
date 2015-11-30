<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    protected $guarded = array();

    public function aeronave()
    {
        return $this->hasMany('App\Aeronave');
    }

    public function contratos()
    {
        return $this->hasMany('App\Contrato');
    }

    public function hangars()
    {
        return $this->belongsToMany('App\Hangar');
    }

    public function ajustes()
    {
        return $this->hasMany('App\Ajuste');
    }
    public function setFechaIngresoAttribute($fecha)
    {
        $this->attributes['fechaIngreso']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }

    public function getFechaIngresoAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" )
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', $fecha);
        return $carbon->format('d/m/Y');
    }

    public function aterrizaje()
    {
        return $this->hasMany('App\Aterrizaje');
    }

    public function despegue()
    {
        return $this->hasMany('App\Despegue');
    }

    public function carga()
    {
        return $this->hasMany('App\Carga');
    }
    
}
