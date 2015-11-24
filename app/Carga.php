<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model {

	protected $guarded = array();

	public function aeronave()
    {
        return $this->belongsTo('App\Aeronave');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function precio()
    {
        return $this->belongsTo('App\PreciosCarga');
    }

}
