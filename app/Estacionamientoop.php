<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacionamientoop extends Model {


    protected $fillable = ['fecha', 'nTaquillas', 'nTurnos', 'total', 'depositado'];

    protected $hidden = ['created_at', 'updated_at'];

    public function setFechaAttribute($fecha)
    {
        $this->attributes['fecha']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }


    public function tickets()
    {
        return $this->hasMany('App\Estacionamientoopticket');
    }

    public function tarjetas()
    {
        return $this->hasMany('App\Estacionamientooptarjeta');
    }

    public function depositos()
    {
        return $this->hasMany('App\Estacionamientoopticketsdeposito');
    }
}
