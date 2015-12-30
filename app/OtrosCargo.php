<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OtrosCargo extends Model {

	protected $guarded = [];	

    public function conceptos()
    {
        return $this->belongsTo('App\Concepto');
    }

    public function despegue()
    {
        return $this->belongsToMany('App\Despegue', 'despegue_otros_cargo', 'otrosCargo_id', 'despegue_id')
                    ->withPivot('monto')
                    ->withTimestamps();
    }

}
