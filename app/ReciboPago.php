<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReciboPago extends Model {

	//

    public function cobro(){
        return $this->belongsTo('App\Cobro');
    }
}
