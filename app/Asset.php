<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{

    protected $primaryKey = 'id';
            
     protected $fillable = ['name','type_id', 'tag', 'brand', 'user_name', 'date_commenced', 'date_disposed','date_acquired','added_by_id'];


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
