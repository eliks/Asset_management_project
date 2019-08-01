<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //

    public function assets()
    {
        return $this->hasMany('App\Asset');
    }

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function parent()
    {
        return $this->belongsTo('App\Location');
    }
}
