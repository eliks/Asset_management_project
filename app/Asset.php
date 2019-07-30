<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function type()
    {
        return $this->belongsTo('App\AssetType');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function maintenanceActivities()
    {
        return $this->hasMany('App\MaintenanceActivities');
    }
}
