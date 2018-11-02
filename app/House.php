<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'id', 'address', 'postcode', 'live_date', 'no_rooms', 'gender', 'landlord', 'dead_date',
    ];

    public function Certificates()
    {
        //return $this->hasMany(Certificate::class, 'certificate_id', 'id');
        return $this->hasMany(Certificate::class, 'house_id', 'id');
        //return $this->hasMany(Certificate::class);
    }

    public function Rooms()
    {
        return $this->hasMany(Room::class);
    }

}
