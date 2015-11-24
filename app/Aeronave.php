<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeronave extends Model {

    protected $guarded = [];

    public function tipo()
    {
        return $this->belongsTo('App\TipoMatricula');
    }
    public function hangar()
    {
        return $this->belongsTo('App\Hangar');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function modelo()
    {
        return $this->belongsTo('App\ModeloAeronave');
    }
    public function nacionalidad()
    {
        return $this->belongsTo('App\NacionalidadMatricula');
    }

    public function aterrizaje()
    {
        return $this->hasMany('App\Aterrizaje');
    }

    public function carga()
    {
        return $this->hasMany('App\Carga');
    }

}
