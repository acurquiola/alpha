<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PreciosAterrizajesDespegue extends Model {

	protected $guarded = [];

	public function conceptos()
    { 
        return $this->belongsTo('App\Concepto');
    }
}
