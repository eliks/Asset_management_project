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

    public function addedBy()
    {
        return $this->belongsTo('App\User', 'added_by_id');
    }


    public function UserType()
    {
        return $this -> hasMany('App\UserType');
    }

    public function getAssetNameAttribute()
    {
        return $this->asset ? $this->asset->name : '';
    }

    public function getAssetNameWithLinkAttribute()
    {
        return $this->asset ? 
        '<a class="text-info" target="_blanc" href="' . route('assets.show', ['id' => $this->asset->id]) .'">' . $this->asset->name . ' <i class="fa fa-link"></i></a>'
         : '';
    }

    public function getAddedByNameWithLinkAttribute()
    {
        return $this->addedBy ? 
        '<a class="text-info" href="' . route('users.show', ['id' => $this->addedBy->id]) .'">' . $this->addedBy->username . ' <i class="fa fa-link"></i></a>'
         : '';
    }

}
