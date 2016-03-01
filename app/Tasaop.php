<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateConverterTrait;

class Tasaop extends Model {

    use DateConverterTrait;

    protected $guarded = array();

    public function detalles()
    {
        return $this->hasMany('App\Tasaopdetalle');
    }

    public function setFechaAttribute($fecha)
    {
        $this->setFecha($fecha,'fecha');
    }
    public function getFechaAttribute($fecha)
    {
        return $this->getFecha($fecha);
    }
}
