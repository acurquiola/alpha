<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturadetalle extends Model {

    protected $guarded = array();


    public function getMontoDesAttribute($value){
        return number_format($value,2);
    }

    public function getDescuentoPerDesAttribute($value){
        return number_format($value,2);
    }

    public function getDescuentoTotalDesAttribute($value){
        return number_format($value,2);
}

    public function getIvaDesAttribute($value){
    return number_format($value,2);
}
    public function getRecargoPerDesAttribute($value){
    return number_format($value,2);
}
    public function getRecargoTotalDesAttribute($value){
    return number_format($value,2);
}
    public function getTotalDesAttribute($value){
    return number_format($value,2);
}
    public function factura()
    {
        return $this->belongsTo('App\Factura');
    }
    public function concepto()
    {
        return $this->belongsTo('App\Concepto');
    }
}
