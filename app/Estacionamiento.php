<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model {



    protected $fillable = ['nTurnos', 'nTaquillas'];

    protected $hidden = ['created_at', 'updated_at'];


    public function portons()
    {
        return $this->hasMany('App\Estacionamientoporton', 'estacionamiento_id');
    }

    public function conceptos()
    {
        return $this->hasMany('App\Estacionamientoconcepto', 'estacionamiento_id');
    }

    public function clientes()
    {
        return $this->hasMany('App\Estacionamientocliente', 'estacionamiento_id');
    }

    public function operaciones(){
        return $this->hasMany('App\Estacionamientoop', 'estacionamiento_id');
    }
}
