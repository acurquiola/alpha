<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model {

    protected $guarded = [];

    public function getFechaInicioAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" && is_string($fecha))
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', $fecha);
        if(is_a($fecha, 'Carbon'))
            $carbon=$fecha;
        return $carbon->format('d/m/Y');
    }
    public function setFechaInicioAttribute($fecha)
    {
        $this->attributes['fecha_inicio']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }

    public function getFechaFinAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" && is_string($fecha))
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', $fecha);
        if(is_a($fecha, 'Carbon'))
            $carbon=$fecha;
        return $carbon->format('d/m/Y');
    }
    public function setFechaFinAttribute($fecha)
    {
        $this->attributes['fecha_fin']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }

    public function detalles()
    {
        return $this->hasMany('App\MetaDetalle');
    }
}
