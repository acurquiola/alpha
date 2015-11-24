<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PreciosCarga extends Model {
	
	protected $guarded = [];

	public function conceptos()
    { 
        return $this->belongsTo('App\Concepto');
    }
	public function carga()
    { 
        return $this->hasOne('App\Carga');
    }
}
