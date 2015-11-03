<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermissionContract;

class Usuario extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract {

    use Authenticatable, CanResetPassword, HasRoleAndPermission;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['userName', 'password'];

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }
    public function aeropuerto()
    {
        return $this->belongsTo('App\Aeropuerto');
    }

    public function getCreatedAtAttribute($fecha)
    {
        $carbon=\Carbon\Carbon::now();
        if(!is_null($fecha) && $fecha!="" )
            $carbon= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fecha);
        return $carbon->format('d/m/Y');
    }

}
