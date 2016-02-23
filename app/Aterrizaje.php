<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateConverterTrait;

class Aterrizaje extends Model {

    use DateConverterTrait;

	protected $guarded = [];

	public function setFechaAttribute($fecha)
	{
        $this->setFecha($fecha,'fecha');
	}

	public function getFechaAttribute($fecha)
	{
        return $this->getFecha($fecha);
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

	public function despegue()
	{
		return $this->hasOne('App\Despegue');
	}

	public function factura()
	{
		return $this->hasMany('App\Factura');
	}

	public function aeropuerto()
    {
        return $this->belongsTo('App\Aeropuerto');
    }


}
