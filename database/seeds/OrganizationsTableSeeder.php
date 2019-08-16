<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
        	 
        	'type_id' => 1,
        	'name' => 'UGCS',
        	'added_by_id' => 1,
  
        ]);

         DB::table('organizations')->insert([
        	 
        	'type_id' => 1,
        	'name' => 'Accounts',
        	'added_by_id' => 1,
  
        ]);

          DB::table('organizations')->insert([
        	 
        	'type_id' => 1,
        	'name' => 'Jane Nelson Hall',
        	'added_by_id' => 1,
  
        ]);

           DB::table('organizations')->insert([
        	 
        	'type_id' => 1,
        	'name' => 'College of Health Sciences',
        	'added_by_id' => 1,
  
        ]);
    }
}
