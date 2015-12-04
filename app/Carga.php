<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model {

	protected $guarded = array();

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

	public function aeronave()
	{
		return $this->belongsTo('App\Aeronave');
	}

	public function cliente()
	{
		return $this->belongsTo('App\Cliente');
	}

	public function precio()
	{
		return $this->belongsTo('App\PreciosCarga');
	}
	    public function aeropuerto()
    {
        return $this->belongsTo('App\Aeropuerto');
    }




}

