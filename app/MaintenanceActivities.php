<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceActivities extends Model
{
    public function asset()
    {
        return $this->belongsTo('App\Asset');
    }

    // public function User()
    // {
    //     return $this->belongsTo('App\User');
    // }


    public function UserType()
    {
        return $this -> hasMany('App\UserType');
    }

    public function getAssetNameAttribute()
    {
        return $this->asset ? $this->asset->name : '';
    }

}
