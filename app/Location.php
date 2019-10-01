<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Location extends Model
{
    protected $primaryKey = 'id';
            
    protected $fillable = ['name','organization_id', 'tag', 'parent_id', 'address', 'added_by_id'];


     public function getNextLocationIdAttribute()
    {
        $Locations = Self::where('id', '>', $this->id)->orderBy('id','ASC');
        
        if (count($Locations->get()) > 0)
            return $Locations->first()->id;

        return Self::where('id', '<>', $this->id)->orderBy('id','ASC')->first()->id;
    }

    public function getPreviousLocationIdAttribute()
    {
        $Locations = Self::where('id', '<', $this->id)->orderBy('id','DESC');
        
        if (count($Locations->get()) > 0)
            return $Locations->first()->id;

        return Self::where('id', '<>', $this->id)->orderBy('id','DESC')->first()->id;
    } 

    public function assets()
    {
        return $this->hasMany('App\Asset');
    }

    public function assetsAddedViaLink(AssetRegistrationLink $link)
    {
        return $this->assets()->whereIn('id', $link->assets->pluck('id'))->get();
    }

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function parent()
    {
        return $this->belongsTo('App\Location');
    }

    public function user()
    {
        return $this->belongsToMany('App\User','users_locations');
    }

    

    public function children()
    {
        $children = Location::where('parent_id', $this->id)->get();

        // if(count($children) == 0) return $children;

        $list = collect();

        foreach($children as $child)
            $list->merge($child->children());

        return $list->merge($children);
    }
}
