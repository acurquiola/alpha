<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Puerto extends Model {


    public function pais()
    {
        return $this->belongsTo('App\Pais');
    }

    public function aterrizaje()
    {
        return $this->hasMany('App\Aterrizaje');
    }

}
