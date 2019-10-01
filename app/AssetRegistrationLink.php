<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetRegistrationLink extends Model
{
	// protected $table = 'asset_registration_link_locations';
    protected $fillable = ['caption', 'description', 'type_id', 'token', 'expiry_date', 'added_by_id'];


    public function getLinkAttribute()
    {
        if($this->type_id == 1)
            return route('assets.register_via_closed_link', ['token' => $this->token]);
        return route('assets.register_via_closed_link', ['token' => $this->token]);
    }

    public function type()
    {           
        return $this->belongsTo('App\AssetRegistrationLinkType');
    }

    public function addedBy()
    {           
        return $this->belongsTo('App\User', 'added_by_id');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Location', 'asset_reg_link_locations');
    }

    public function assets()
    {
        return $this->belongsToMany('App\Asset', 'asset_asset_reg_links');
    }
}
