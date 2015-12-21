<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturametadata extends Model {

    protected $guarded = array();

    public function factura()
    {
        return $this->belongsTo('App\Factura', 'factura_id', 'nFactura');
    }
}
