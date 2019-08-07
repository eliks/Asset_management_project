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
}
