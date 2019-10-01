<?php

use Illuminate\Database\Seeder;

class AssetRegistrationLinkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_registration_link_types')->insert([
            'name' => 'Closed',
            'added_by_id' => 1,
        ]);

        DB::table('asset_registration_link_types')->insert([
            'name' => 'Open',
            'added_by_id' => 1,
        ]);
    }
}
