<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobro extends Model {

    protected $guarded = array();

    public function ajustes()
    {
        return $this->hasMany('App\Ajuste');
    }

    public function pagos()
    {
        return $this->hasMany('App\Cobrospago');
    }


    public function facturas()
    {
        return $this->belongsToMany('App\Factura')->withPivot('monto')-> withTimestamps();
    }

    public function getCreatedAtAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" )
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fecha);
        return $carbon->format('d/m/Y');
    }

    public function cliente(){
        return $this->facturas()->first()->cliente;
    }
}
