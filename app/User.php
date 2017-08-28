<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

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

    /**
     * Set the password's hashing.
     *
     * @param  string  $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getActivationAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * User mempunyai beberapa portal
     */
    public function portals()
    {
        return $this->hasMany('App\Portal');
    }

    /**
     * User mempunyai beberapa role
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}