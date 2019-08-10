<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{

    protected $primaryKey = 'id';
            
     protected $fillable = ['name','type_id', 'tag', 'brand', 'user_name', 'date_commenced', 'date_acquired', 'location_id','added_by_id'];

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

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
