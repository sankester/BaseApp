<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{

    /**
     * Column yang dapak di akses
     * @var array
     */
    protected $fillable = [
        'pref_group', 'pref_name', 'pref_value','user_id'
    ];

    /**
     * Satu preference memeiliki satu user
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
