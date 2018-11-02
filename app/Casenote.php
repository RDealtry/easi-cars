<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casenote extends Model
{
    protected $fillable = [
        'tenant_id', 'user_id', 'note', 'casenote_date',
    ];

    /**
    function users(){
        return $this->hasMany('App\User');
    }
    function tenants(){
        return $this->hasMany('App\Tenant');
    }
 */
}

