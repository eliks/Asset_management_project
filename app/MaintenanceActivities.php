<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceActivities extends Model
{
    protected $primaryKey = 'id'; 
    protected $fillable = ['asset_id','description','maintained_by', 'maintained_at','supervised_by','location','comment','added_by_id'];

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
