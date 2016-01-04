<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model {

    use SoftDeletes;

    static public function NCONTROLDEFAULTPREFIX(){
        return \App\Modulo::where('aeropuerto_id', session('aeropuerto')->id)->groupby('numeroControlPrefix')->get()->fetch('numeroControlPrefix')->toArray();
    }

    protected $primaryKey = 'nFactura';

    protected $guarded = array();

    protected $dates = ['fecha', 'fechaVencimiento'];

    public static function getNControlMax($searchPrefix=null){
        $nControlSearchPrefix=($searchPrefix==null)?self::NCONTROLDEFAULTPREFIX():$searchPrefix;
        $nControlprefixMax=[];
        foreach($nControlSearchPrefix as $prefix){
            $nControlprefixMax[$prefix]=(\DB::
                table('facturas')
                    ->where('nControlPrefix',$prefix)
                    ->groupby('nControlPrefix')
                    ->max('nControl')+1);
        }
        return $nControlprefixMax;
    }

    public function detalles()
    {
        return $this->hasMany('App\Facturadetalle', 'factura_id', 'nFactura');
    }

    public function metadata()
    {
        return $this->hasOne('App\Facturametadata', 'factura_id', 'nFactura');
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
        return $this->hasOne('App\Despegue', 'factura_id', 'nFactura');
    }

    public function carga()
    {
        return $this->hasOne('App\Carga', 'factura_id', 'nFactura');
    }

    public function setFechaAttribute($fecha)
    {
        $this->attributes['fecha']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }
    public function getFechaAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" )
            $carbon= $fecha;
        return $fecha->format('d/m/Y');
    }
    public function setFechaVencimientoAttribute($fecha)
    {
        $this->attributes['fechaVencimiento']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }
    public function getFechaVencimientoAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now()->addMonth();
        if(!is_null($fecha) && $fecha!="" )
            $carbon= $fecha;
        return $carbon->format('d/m/Y');
    }

    public function setFechaControlContratoAttribute($fecha)
    {
        $this->attributes['fechaControlContrato']=\Carbon\Carbon::createFromFormat('d/m/Y', $fecha);
    }
    public function getFechaControlContratoAttribute($fecha)
    {
        if(!is_null($fecha) && $fecha!="" )
            return $fecha->format('d/m/Y');
        return "";
    }
}
