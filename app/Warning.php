<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    protected $fillable = [
        'tenant_id', 'user_id', 'note', 'warning_date', 'reason', 'warning_no', 'manager_yn', 'expiry_date',
    ];

    function users(){
        return $this->hasMany('App\User');
    }
    function tenants(){
        return $this->hasMany('App\Tenant');
    }
}

