<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model {

    protected $guarded = [];

    public function conceptos(){

        return $this->hasMany('App\Concepto');
    }

    public function estacionamiento()
    {
        return $this->hasOne('App\Estacionamiento');
    }

    public function hangar()
    {
        return $this->hasMany('App\Hangar');
    }

    public function metas()
    {
        return $this->hasMany('App\Meta');
    }


    public function usuarios()
    {
        return $this->hasMany('App\Usuario');
    }

}
