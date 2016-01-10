<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobro extends Model {

    protected $guarded = array();

    public function ajustes()
    {
        return $this->hasMany('App\Ajuste');
    }

    public function pagos()
    {
        return $this->hasMany('App\Cobrospago');
    }


    public function facturas()
    {
        return $this->belongsToMany('App\Factura', 'cobro_factura', 'cobro_id', 'factura_id')
            ->withPivot('monto',
            'retencionFecha',
            'retencionComprobante',
            'base',
            'iva',
            'islrpercentage',
            'ivapercentage',
            'retencion',
            'total')-> withTimestamps();
    }

    public function getCreatedAtAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" )
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fecha);
        return $carbon->format('d/m/Y');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

    public function modulo(){
        return $this->belongsTo('App\Modulo');
    }


    protected function parseDecimal($numero, $attr){
        if(is_string($numero)){
            $numero=preg_replace ( '/\./i', "", $numero );
            $numero=preg_replace ( '/\,/i', ".", $numero );
            $numero=floatval($numero);
        }
        $this->attributes[$attr]=$numero;
    }

    public function setMontofacturasAttribute($numero)
    {
        $this->parseDecimal($numero,'montofacturas');
    }

    public function setMontodepositadoAttribute($numero)
    {
        $this->parseDecimal($numero,'montodepositado');
    }
}
