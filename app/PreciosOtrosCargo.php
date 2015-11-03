<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PerciosOtrosCargo extends Model {

	protected $guarded = [];

	public function conceptos()
    { 
        return $this->belongsTo('App\Concepto');
    }

}
