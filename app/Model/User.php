<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','name', 'email', 'password','username','lock_st','registerDate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // set kolom to date object
    protected $dates = ['activation'];


    public function getActivationAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * User mempunyai beberapa portal
     */
    public function portals()
    {
        return $this->hasMany('App\Model\Portal');
    }

    /**
     * User mempunyai beberapa role
     */
    public function role()
    {
        return $this->belongsTo('App\Model\Role');
    }

    public function hasPortal($portal)
    {
        if ($this->role()->portal()->where('id', $portal)->first()) {
            return true;
        }else{
            return false;
        }
    }

    public function isPortal($portal_nm)
    {
        if($this->role->portal->portal_nm == $portal_nm){
            return true;
        }
        return false;
    }
}
