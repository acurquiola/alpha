<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facturadetalle extends Model {

    protected $guarded = array();

    public function factura()
    {
        return $this->belongsTo('App\Factura', 'factura_id', 'nFactura');
    }
    public function concepto()
    {
        return $this->belongsTo('App\Concepto');
    }
}
