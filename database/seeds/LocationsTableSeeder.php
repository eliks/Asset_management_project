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
            'name' => 'UGCS Lab 1A',
            'tag' => 'UG/UGCS/LB/1A',
            'organization_id' => '1',
            'parent_id' =>'1',
            'address' => 'UGCS/LAB/1A',
              'added_by_id' => 1,
        ]);

        DB::table('locations')->insert([
            'name' => 'UGCS Lab 1B',
            'tag' => 'UG/UGCS/LB/1B',
            'organization_id' => '1',
            'parent_id' =>'1',
            'address' => 'UGCS/LAB/1B',
              'added_by_id' => 1,
        ]);

        DB::table('locations')->insert([
            'name' => 'UGCS Lab 2A',
            'tag' => 'UG/UGCS/LB/2A',
            'organization_id' => '1',
            'parent_id' =>'1',
            'address' => 'UGCS/LAB/2A',
              'added_by_id' => 1,
        ]);

         DB::table('locations')->insert([
            'name' => 'UGCS Lab 2B',
            'tag' => 'UG/UGCS/LB/2B',
            'organization_id' => '1',
            'parent_id' =>'1',
            'address' => 'UGCS/LAB/2B',
              'added_by_id' => 1,
        ]);

          DB::table('locations')->insert([
            'name' => 'UGCS Lab 3A',
            'tag' => 'UG/UGCS/LB/3A',
            'organization_id' => '1',
            'parent_id' =>'1',
            'address' => 'UGCS/LAB/3B',
              'added_by_id' => 1,
        ]);

           DB::table('locations')->insert([
            'name' => 'UGCS Lab 3B',
            'tag' => 'UG/UGCS/LB/3B',
            'organization_id' => '1',
            'parent_id' =>'1',
            'address' => 'UGCS/LAB/3B',
              'added_by_id' => 1,
        ]);

            DB::table('locations')->insert([
            'name' => 'UGCS Lab 4A',
            'tag' => 'UG/UGCS/LB/4A',
            'organization_id' => '1',
            'parent_id' =>'1',
            'address' => 'UGCS/LAB/4A',
              'added_by_id' => 1,
        ]);

             DB::table('locations')->insert([
            'name' => 'UGCS Lab 4B',
            'tag' => 'UG/UGCS/LB/4B',
            'organization_id' => '1',
            'parent_id' =>'1',
            'address' => 'UGCS/LAB/4B',
              'added_by_id' => 1,
        ]);

              DB::table('locations')->insert([
            'name' => 'Cash Office ',
            'tag' => 'CA/OFF/RM/1',
            'organization_id' => '2',
            'parent_id' =>'9',
            'address' => 'UG/CHOFF',
              'added_by_id' => 1,
        ]);

               DB::table('locations')->insert([
            'name' => 'Account Office',
            'tag' => 'AC/OFF/RM/1',
            'organization_id' => '3',
            'parent_id' =>'9',
            'address' => 'UG/ACCOFF',
              'added_by_id' => 1,
        ]);
    }
}
