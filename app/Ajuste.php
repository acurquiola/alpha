<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model {

    protected $guarded = array();

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function cobro()
    {
        return $this->belongsTo('App\Cobro');
    }
}
