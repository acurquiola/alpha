<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DecimalConverterTrait;
use App\Traits\DateConverterTrait;

class Cobrospago extends Model {

    use DecimalConverterTrait;
    use DateConverterTrait;

    protected $guarded = array();

    public function cobro()
    {
        return $this->belongsTo('App\Cobro');
    }

    public function setFechaAttribute($fecha)
    {
        $this->setFecha($fecha,'fecha');
    }
    public function getFechaAttribute($fecha)
    {
        return $this->getFecha($fecha);
    }

    public function setMontoAttribute($numero)
    {
        $this->parseDecimal($numero,'monto');
    }
}
