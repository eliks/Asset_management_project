<?php

use Illuminate\Database\Seeder;

class AssetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_types')->insert([
            'name' => 'Desktop Computer',
            'added_by_id' => 1,
        ]);

        DB::table('asset_types')->insert([
            'name' => 'Laptop Computer',
            'added_by_id' => 1,
        ]);

        DB::table('asset_types')->insert([
            'name' => 'Dispenser',
            'added_by_id' => 1,
        ]);

        DB::table('asset_types')->insert([
            'name' => 'Air Conditioner',
            'added_by_id' => 1,
        ]);

        DB::table('asset_types')->insert([
            'name' => 'Table',
            'added_by_id' => 1,
        ]);

        DB::table('asset_types')->insert([
            'name' => 'Chair',
            'added_by_id' => 1,
        ]);
    }
}
