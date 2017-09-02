<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_nm', 'role_desc', 'default_page','portal_id','user_id'
    ];

    /**
     * Mengambil data role berdasarkan user.
     * Setiap satu Role dimiliki satu user
     */
    public function users()
    {
        return $this->hasMany('App\Model\User');
    }

    /**
     * Mengambil data portal berdasarkan user.
     * Setiap satu portal dimiliki satu user
     */
    public function portal()
    {
        return $this->belongsTo('App\Model\Portal');
    }

    public function navs()
    {
        return $this->belongsToMany('App\Model\Nav')->withPivot('c','r','u','d');
    }
}
