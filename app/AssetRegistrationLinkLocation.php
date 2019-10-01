<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetRegistrationLinkLocation extends Model
{
    protected $fillable = ['asset_registration_link_id', 'location_id', 'added_by_id'];
    protected $table = 'asset_reg_link_locations';
}
