<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function type()
    {
        return $this->belongsTo('App\AssetType');
    }
}
