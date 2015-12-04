<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturadetalle extends Model {

    protected $guarded = array();

    public function factura()
    {
        return $this->belongsTo('App\Factura');
    }
    public function concepto()
    {
        return $this->belongsTo('App\Concepto');
    }
}
