<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model {

    protected $guarded = [];

    public function usuarios()
    {
        return $this->hasMany('App\Usuario');
    }


    public function hangar()
    {
        return $this->hasMany('App\Hangar');
    }

    public function estacionamiento()
    {
        return $this->hasOne('App\Estacionamiento');
    }


}
