<?php

use Illuminate\Database\Seeder;

class UserLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_locations')->insert([
        	 
        	'user_id' => 2,
        	'location_id' => 3,
        	'added_by_id' => 4,
  
        ]);

         DB::table('users_locations')->insert([
        	
        	'user_id' => 6,
        	'location_id' => 7,
        	'added_by_id' => 8,
  
        ]);

          DB::table('users_locations')->insert([
        	  
        	'user_id' => 10,
        	'location_id' => 11,
        	'added_by_id' => 12,
  
        ]);
    }
}
