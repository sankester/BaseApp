<?php

namespace App\Model;

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

    public function scopePublished($query)
    {
        $query->where('display_st','=','1');
    }

    /**
     * Satu navaigasi memepunya satu portal
     * Setiap satu portal dimiliki satu user
     */
    public function portal()
    {
        return $this->belongsTo('App\Model\Portal');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role')->withPivot('c','r','u','d');
    }
}
