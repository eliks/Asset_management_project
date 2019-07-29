<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'name' => 'Eb Ghartey',
            'tag' => 'Office1',
            'organization_id' => '1',
            'parent_id' =>'0012',
            'address' => 'UGCS lab4A',
              'added_by_id' => 1,
        ]);

        DB::table('locations')->insert([
            'name' => 'Kobina Twum',
            'tag' => 'Office1',
            'organization_id' => '1',
            'parent_id' =>'0012',
            'address' => 'UGCS lab4A',
              'added_by_id' => 2,
        ]);

        DB::table('locations')->insert([
            'name' => 'Clinton',
            'tag' => 'Office2',
            'organization_id' => '3',
            'parent_id' =>'0012',
            'address' => 'UGCS lab4A',
              'added_by_id' => 1,
        ]);
    }
}
