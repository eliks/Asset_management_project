<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{

    protected $primaryKey = 'id';
            
     protected $fillable = ['name','type_id', 'tag', 'next_maintenance_date', 'brand', 'user_name', 'date_commenced', 'date_acquired', 'location_id','added_by_id'];

    public function getNextAssetIdAttribute()
    {
        $assets = Self::where('id', '>', $this->id)->orderBy('id','ASC');
        
        if (count($assets->get()) > 0)
            return $assets->first()->id;

        return Self::where('id', '<>', $this->id)->orderBy('id','ASC')->first()->id;
    }

    public function getPreviousAssetIdAttribute()
    {
        $assets = Self::where('id', '<', $this->id)->orderBy('id','DESC');
        
        if (count($assets->get()) > 0)
            return $assets->first()->id;

        return Self::where('id', '<>', $this->id)->orderBy('id','DESC')->first()->id;
    }

    public function getMaintenanceIsDue()
    {
        if(strtotime($this->next_maintenance_date) >= strtotime('now'))
            return true;
        return false;
    }

    public function getNumberOfDaysToMaintenanceAttribute()
    {
        if($this->next_maintenance_date){
            $ret = ceil((strtotime($this->next_maintenance_date) - strtotime('now'))/(60*60*24));

            if($ret >= 0)
                return $ret;
        }
        return 0;
    }

    public function getStatusColourAttribute()
    {
        if($this->number_of_days_to_maintenance <= 20)
        {
            return 'bg-red';
        }

        if($this->number_of_days_to_maintenance <= 40)
        {
            return 'bg-yellow';
        }

        return 'bg-green';
    }


    public function type()
    {           
        return $this->belongsTo('App\AssetType');
    }


    public function location()
    {
        return $this->belongsTo('App\location');
    }


    public function maintenanceActivities()
    {
        return $this->hasMany('App\MaintenanceActivities');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
