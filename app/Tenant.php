<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    public function Rooms()
    {
        return $this->hasMany(Room::class);
    }
    //public function Casenotes()
    public function casenotes()
    {
        //return $this->hasMany(Casenote::class);
        //return $this->hasOne(App\Casenote);
        //return $this->belongsToMany("App\User", "casenotes", "user_id", "tenant_id");
        return $this->belongsTo(App\Casenote);
    }

}
