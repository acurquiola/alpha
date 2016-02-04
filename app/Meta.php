<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateConverterTrait;

class Meta extends Model {

    use DateConverterTrait;

    protected $guarded = [];

    public function getFechaInicioAttribute($fecha)
    {
        return $this->getFecha($fecha);
    }
    public function setFechaInicioAttribute($fecha)
    {
        $this->setFecha($fecha,'fecha_inicio');
    }

    public function getFechaFinAttribute($fecha)
    {
        return $this->getFecha($fecha);
    }
    public function setFechaFinAttribute($fecha)
    {
        $this->setFecha($fecha,'fecha_fin');
    }

    public function detalles()
    {
        return $this->hasMany('App\MetaDetalle');
    }
}
