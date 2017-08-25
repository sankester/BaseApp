<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    /**
     * Set kolom yang dapat di akses
     * @var array
     */
    protected $fillable = [
        'user_id', 'portal_nm', 'site_title','site_desc','meta_desc','meta_keyword'
    ];

    /**
     * Mengmbil portal berdasarkan user
     * Setiap satu portal memiliki satu user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Portal mempunyai beberapa role
     */
    public function roles()
    {
        return $this->hasMany('App\Role');
    }

    /**
     * Satu portal mempunyai beberapa navigasi
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function navs()
    {
        return $this->hasMany('App\Nav','portal_id','id');
    }
}
