<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Location extends Model
{
    protected $primaryKey = 'id';
            
     protected $fillable = ['name','organization_id', 'tag', 'parent_id', 'address', 'added_by_id'];

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
