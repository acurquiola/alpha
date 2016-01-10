<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobrospago extends Model {

    protected $guarded = array();

    public function cobro()
    {
        return $this->belongsTo('App\Cobro');
    }

    public function setFechaAttribute($fecha)
    {
        $this->attributes['fecha']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }
    public function getFechaAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" && is_string($fecha))
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', trim($fecha, " 00:00:00"));
        if(is_a($fecha, 'Carbon'))
            $carbon=$fecha;
        return $carbon->format('d/m/Y');
    }


    protected function parseDecimal($numero, $attr){
        if(is_string($numero)){
            $numero=preg_replace ( '/\./i', "", $numero );
            $numero=preg_replace ( '/\,/i', ".", $numero );
            $numero=floatval($numero);
        }
        $this->attributes[$attr]=$numero;
    }

    public function setMontoAttribute($numero)
    {
        $this->parseDecimal($numero,'monto');
    }
}
