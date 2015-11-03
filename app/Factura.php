<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model {

    protected $guarded = array();

    public function detalles()
    {
        return $this->hasMany('App\Facturadetalle');
    }

    public function metadata()
    {
        return $this->hasOne('App\Facturametadata');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function cobros()
    {
        return $this->belongsToMany('App\Cobro')->withPivot('monto')-> withTimestamps();
    }


    public function getSubtotalNetoAttribute($value){
        return number_format($value,2);
    }
    public function getDescuentoTotalAttribute($value){
        return number_format($value,2);
    }
    public function getSubtotalAttribute($value){
        return number_format($value,2);
    }

    public function getIvaAttribute($value){
        return number_format($value,2);
    }
    public function getRecargoTotalAttribute($value){
        return number_format($value,2);
    }
    public function getTotalAttribute($value){
        return number_format($value,2);
    }
    public function setFechaAttribute($fecha)
    {
        $this->attributes['fecha']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }
    public function getFechaAttribute($fecha)
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
        $carbon=\Carbon\Carbon::now()->addMonth();
        if(!is_null($fecha) && $fecha!="" )
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', $fecha);
        return $carbon->format('d/m/Y');
    }
}
