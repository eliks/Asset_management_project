<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersLocation extends Model
{
    protected $fillable = [
        'user_id','location_id','added_by_id'
    ];
}
