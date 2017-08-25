<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    public $child = array();
    /**
     * Set kolom yang dapat di akses
     * @var array
     */
    protected $fillable = [
        'portal_id','parent_id', 'nav_title','nav_desc', 'nav_url','nav_no','active_st','display_st','nav_icon','nav_st','user_id'
    ];

    /**
     * Satu navaigasi memepunya satu portal
     * Setiap satu portal dimiliki satu user
     */
    public function portal()
    {
        return $this->belongsTo('App\Portal');
    }

    public function childs() {
        return $this->hasMany('App\Nav','parent_id','id') ;
    }
}
