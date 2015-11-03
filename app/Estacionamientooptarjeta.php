<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacionamientooptarjeta extends Model {

    protected $fillable = ['fecha', 'estacionamientocliente_id', 'cantidad', 'banco_id', 'bancoscuenta_id', 'total', 'deposito'];

    protected $hidden = ['created_at', 'updated_at'];

    public function setFechaAttribute($fecha)
    {
        $this->attributes['fecha']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }

    public function operacion()
    {
        return $this->belongsTo('App\Estacionamientoop', 'estacionamientoop_id');
    }

    public function banco()
    {
        return $this->belongsTo('App\Banco');
    }

    public function bancoCuenta()
    {
        return $this->belongsTo('App\Bancoscuenta', 'bancoscuenta_id');
    }

    public function cliente(){
        return $this->belongsTo('App\EstacionamientoCliente', 'estacionamientocliente_id');
    }
}
