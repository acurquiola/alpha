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
        if(!is_null($fecha) && $fecha!="" && is_string($fecha))
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', trim($fecha, " 00:00:00"));
        if(is_a($fecha, 'Carbon'))
            $carbon=$fecha;
        return $carbon->format('d/m/Y');
    }
    public function setFechaVencimientoAttribute($fecha)
    {
        $this->attributes['fechaVencimiento']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }
    public function getFechaVencimientoAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" && is_string($fecha))
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', trim($fecha, " 00:00:00"));
        if(is_a($fecha, 'Carbon'))
            $carbon=$fecha;
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
    public function facturas()
    {
        return $this->hasMany('App\Factura');
    }
    public function hasFacturaByFecha($year, $month){
        $fechaFin=\Carbon\Carbon::create($year, $month, 1)->lastOfMonth();
        return $this->facturas()->where('fechaControlContrato', $fechaFin)->count();
    }
}
