<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Aterrizaje extends Model {


     protected $guarded = [];


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


}
