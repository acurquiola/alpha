<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Despegue extends Model {

    protected $guarded = array();

    public function setFechaAttribute($fecha)
    {
        $this->attributes['fecha']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }

    public function getFechaAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" && is_string($fecha))
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', str_replace( " 00:00:00", "", $fecha));
        if(is_a($fecha, 'Carbon'))
            $carbon=$fecha;
        return $carbon->format('d/m/Y');
    }

    public function aterrizaje()
    {
        return $this->belongsTo('App\Aterrizaje');
    }
	public function puerto()
    {
        return $this->belongsTo('App\Puerto');
    }

    public function piloto()
    {
        return $this->belongsTo('App\Piloto');
    }


    public function nacionalidad_vuelo()
    {
        return $this->belongsTo('App\NacionalidadVuelo', 'nacionalidadVuelo_id');
    }

    public function aeronave()
    {
        return $this->belongsTo('App\Aeronave');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function tipo()
    {
        return $this->belongsTo('App\TipoMatricula', 'tipoMatricula_id');
    }

    public function aeropuerto()
    {
        return $this->belongsTo('App\Aeropuerto');
    }

    public function factura()
    {
        return $this->belongsTo('App\Factura');
    }

    public function otros_cargos()
    {
        return $this->belongsToMany('App\OtrosCargo', 'despegue_otros_cargo', 'despegue_id', 'otrosCargo_id')
                    ->withPivot('monto')
                    ->withTimestamps();
    }

}
