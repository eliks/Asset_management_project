<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetAssetRegistrationLink extends Model
{
    protected $fillable = ['asset_registration_link_id', 'asset_id', 'added_by_id'];
    protected $table = 'asset_asset_reg_links';
}
