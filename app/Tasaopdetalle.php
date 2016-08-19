<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateConverterTrait;


class Tasaopdetalle extends Model {
    use DateConverterTrait;

    protected $guarded = array();

    public function tasa()
    {
        return $this->hasMany('App\Tasa');
    }

}
