<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersLocation extends Model
{
    protected $fillable = [
        'location_id', 'user_id'
    ];
}
