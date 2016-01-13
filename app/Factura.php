<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model {

    use SoftDeletes;

    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
                $model->attributes["nFactura"]=$model->getMaxWith(
                                                                "nFacturaPrefix",
                                                                "nFactura",
                                                                $model->attributes["nFacturaPrefix"]);
        });

    }


    protected $guarded = array();

    protected $dates = ['fecha', 'fechaVencimiento'];

    public static function getMaxWith($prefixColumn, $column, $searchPrefix){
        $aeropuertoSigla=session('aeropuerto')->siglas;
        $max=config("facturas.$column.$aeropuertoSigla.$searchPrefix");
        return max($max,\DB::table('facturas')->where($prefixColumn,$searchPrefix)->groupby($prefixColumn)->max($column)+1);
    }

    public function detalles()
    {
        return $this->hasMany('App\Facturadetalle');
    }

    public function metadata()
    {
        return $this->hasOne('App\Facturametadata');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function aterrizaje()
    {
        return $this->belongsTo('App\Aterrizaje');
    }

    public function cobros()
    {
        return $this->belongsToMany('App\Cobro', 'cobro_factura', 'factura_id', 'cobro_id')
            ->withPivot('monto',
                'retencionFecha',
                'retencionComprobante',
                'base',
                'iva',
                'islrpercentage',
                'ivapercentage',
                'retencion',
                'total')
            ->withTimestamps();
    }

    public function aeropuerto()
    {
        return $this->belongsTo('App\Aeropuerto');
    }

    public function modulo()
    {
        return $this->belongsTo('App\Modulo');
    }

    public function despegue()
    {
        return $this->hasOne('App\Despegue');
    }

    public function carga()
    {
        return $this->hasOne('App\Carga');
    }

    public function setFechaAttribute($fecha)
    {
        $this->attributes['fecha']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }
    public function getFechaAttribute($fecha)
    {

        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" && is_string($fecha))
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', trim($fecha, " 00:00:00"));
        if(is_a($fecha, 'Carbon'))
            $carbon=$fecha;
        return $carbon->format('d/m/Y');
    }
    public function setFechaVencimientoAttribute($fecha)
    {
        $this->attributes['fechaVencimiento']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }
    public function getFechaVencimientoAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now()->addMonth();
        if(!is_null($fecha) && $fecha!="" && is_string($fecha))
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', trim($fecha, " 00:00:00"));
        if(is_a($fecha, 'Carbon'))
            $carbon=$fecha;
        return $carbon->format('d/m/Y');
    }

    public function setFechaControlContratoAttribute($fecha)
    {
        $this->attributes['fechaControlContrato']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }
    public function getFechaControlContratoAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" && is_string($fecha))
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d', trim($fecha, " 00:00:00"));
        if(is_a($fecha, 'Carbon'))
            $carbon=$fecha;
        return $carbon->format('d/m/Y');
    }

    protected function parseDecimal($numero, $attr){
        if(is_string($numero)){
            $numero=preg_replace ( '/\./i', "", $numero );
            $numero=preg_replace ( '/\,/i', ".", $numero );
            $numero=floatval($numero);
        }
        $this->attributes[$attr]=$numero;
    }

    public function setSubtotalNetoAttribute($numero)
    {
        $this->parseDecimal($numero,'subtotalNeto');
    }

    public function setDescuentoTotalAttribute($numero)
    {
        $this->parseDecimal($numero,'descuentoTotal');
    }

    public function setSubtotalAttribute($numero)
    {
        $this->parseDecimal($numero,'subtotal');
    }

    public function setIvaAttribute($numero)
    {
        $this->parseDecimal($numero,'iva');
    }

    public function setRecargoTotalAttribute($numero)
    {
        $this->parseDecimal($numero,'recargoTotal');
    }

    public function setTotalAttribute($numero)
    {
        $this->parseDecimal($numero,'total');
    }
}
