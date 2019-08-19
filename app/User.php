<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primarykey ='id';
     // protected $table = 'user';

    protected $fillable = [
        'username', 'email', 'password', 'type_id' ,'location_id', 'added_by_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function locations()
    {           
        return $this->belongsToMany('App\Location', 'users_locations');
    }

     public function impliedLocations()
    {       
        $impliedLocations = collect();    
        
        foreach($this->locations as $location)
            $impliedLocations->merge($location->children());

        return $impliedLocations->merge($this->locations);
    }

       public function type()
    {           
        return $this->belongsTo('App\UserType');
    }

    public function assets()
    {
        return $this->hasMany('App\Asset');
    }

    public function setPasswordAttribute($value){
    $this->attributes['password'] = bcrypt($value);
}
}

