<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacionamientoopticket extends Model {

    protected $fillable = ['econcepto_id', 'taquilla', 'turno', 'costo', 'cantidad', 'monto'];

    protected $hidden = ['created_at', 'updated_at'];

    public function setFechaAttribute($fecha)
    {
        $this->attributes['fecha']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }

    public function concepto()
    {
        return $this->belongsTo('App\Estacionamientoconcepto', 'econcepto_id');
    }

    public function operacion()
    {
        return $this->belongsTo('App\Estacionamientoop', 'estacionamientoop_id');
    }



}
