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
        if(!is_null($fecha) && $fecha!="" )
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', $fecha);
        return $carbon->format('d/m/Y');
    }
}
