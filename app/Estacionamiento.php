<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model {



    protected $fillable = ['nTurnos', 'nTaquillas', 'tarjetacosto'];

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


    protected function parseDecimal($numero, $attr){
        if(is_string($numero)){
            $numero=preg_replace ( '/\./i', "", $numero );
            $numero=preg_replace ( '/\,/i', ".", $numero );
            $numero=floatval($numero);
        }
        $this->attributes[$attr]=$numero;
    }

    public function setTarjetacostoAttribute($numero)
    {
        $this->parseDecimal($numero,'tarjetacosto');
    }
}
