<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DecimalConverterTrait;
use App\Traits\DateConverterTrait;

class Cobrospago extends Model {

    use DecimalConverterTrait;
    use DateConverterTrait;

    protected $guarded = array();

/*    public static function filter($cuenta_id, $tipo, $ncomprobante, $cobro_id)
    {
        return Cobrospago::cuenta($cuenta_id)
                    ->tipo($tipo)
                    ->referencia($ncomprobante)
                    ->cobro($cobro_id)
                    ->orderBy('id', 'DESC');
    }*/

    public function cobro()
    {
        return $this->belongsTo('App\Cobro');
    }

    public function banco()
    {
        return $this->belongsTo('App\Banco');
    }

    public function cuenta()
    {
        return $this->belongsTo('App\Bancoscuenta');
    }

    public function setFechaAttribute($fecha)
    {
        $this->setFecha($fecha,'fecha');
    }
    public function getFechaAttribute($fecha)
    {
        return $this->getFecha($fecha);
    }

    public function setMontoAttribute($numero)
    {
        $this->parseDecimal($numero,'monto');
    }

    public function getTipoAttribute($value){
        $d=
            [
                "D"  => "DEP",
                "NC" => "NC",
                "T"  => "TRAN"
            ];
        return (array_key_exists($value, $d))?$d[$value]:"";
    }


    //Filtros
    
    public function scopeNumerocobro($query, $cobro_id)
    {
        if($cobro_id == '0'){
            $query->where('cobro_id', '>', '0');
        }else{
            $query->where('cobro_id', $cobro_id);
        }
    }
    
    public function scopeNumerocuenta($query, $cuenta_id)
    {
        if($cuenta_id == '0'){
            $query->where('cuenta_id', '>', '0');
        }else{
            $query->where('cuenta_id', $cuenta_id);
        }
    }
    public function scopeTipotransaccion($query, $tipo)
    {

        if (trim($tipo) != ""){
            $query->where('tipo', $tipo);
        }
    }
    public function scopeNombrebanco($query, $banco_id)
    {
        if($banco_id == '0'){
            $query->where('banco_id', '>', '0');
        }else{
            $query->where('banco_id', $banco_id);
        }
    }
    public function scopeReferencia($query, $ncomprobante)
    {
        if($ncomprobante == '0'){
            $query->where('ncomprobante', '>', '0');
        }else{
            $query->where('ncomprobante', $ncomprobante);
        }
    }

    public function scopeFechainicial($query, $fecha_inicio)
    {
        if($fecha_inicio != ""){
            $fecha_inicio            =\Carbon\Carbon::createFromFormat('d/m/Y', $fecha_inicio);
            $fecha_inicio            = $fecha_inicio->toDateString();
            $query->where('fecha', ">=", "%$fecha_inicio%");
        }
        
    }

    public function scopeFechafinal($query, $fecha_fin)
    {
        if($fecha_fin != ""){
            $fecha_fin            =\Carbon\Carbon::createFromFormat('d/m/Y', $fecha_fin);
            $fecha_fin            = $fecha_fin->toDateString();
            $query->where('fecha', "<=", "%$fecha_fin%");
        }
        
    }

    public function scopeConciliado($query)
    {
        $query->where('conciliado', '0');   
    }
    /*
    public function scopeFechaFin($query, $fecha_fin)
    {
        if (trim($fecha_fin) != ""){
            $query->where('fecha', "<=", "%$fecha_fin%");
        }
    }*/
}
