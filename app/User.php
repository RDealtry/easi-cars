<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //public function Casenotes()
    //{
    //    return $this->hasMany(Casenote::class);
    //}

    public function casenotes()
    {
        //return $this->hasMany(Casenote::class);
        //return $this->hasOne(App\Casenote);
        //return $this->belongsToMany("App\Tenant", "casenotes", "tenant_id", "user_id");
        return $this->belongsTo(App\Casenote);

    }

}
