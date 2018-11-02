<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'id', 'house_id', 'type', 'cert_no', 'issued',
    ];

    public function house()
    {
        //return $this->belongsTo(House::class);
        return $this->belongsTo(House::class, 'house_id', 'id');
    }

}
