<?php

use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assets')->insert([
            'name' => 'UGCS General Office Desktop PC 1',
            'tag' => 'UG/UGCS/GO/2019/PC/01',
			'type_id' => 1,
			'brand' => 'DEL',
			'user_name' => 'Brown Parker',
            'parent_id' => 1,
            'location_id' => 1,
            'date_commenced' => date('y-m-d'),
            'date_disposed' => date('y-m-d'),
            'date_acquired' => date('y-m-d'),
            'added_by_id' => 1,
        ]);

        DB::table('assets')->insert([
            'name' => 'UGCS Help Desk Desktop PC',
            'tag' => 'UG/UGCS/HD/2018/PC/23',
			'type_id' => 1,
			'brand' => 'Toshiba',
			'user_name' => 'Philip Ntiamoah',
            'parent_id' => 1,
            'location_id' => 1,
            'date_commenced' => date('y-m-d'),
            'date_disposed' => date('y-m-d'),
            'date_acquired' => date('y-m-d'),
            'added_by_id' => 1,
        ]);

        DB::table('assets')->insert([
            'name' => 'Cash Office Laptop PC',
            'tag' => 'CA/OFF/LP/2011/PC/01',
            'type_id' => 2,
            'brand' => 'Acer',
            'user_name' => 'Abigail Ashong',
            'parent_id' => 3,
            'location_id' => 9,
            'date_commenced' => date('y-m-d'),
            'date_disposed' => date('y-m-d'),
            'date_acquired' => date('y-m-d'),
            'added_by_id' => 1,
        ]);

        DB::table('assets')->insert([
            'name' => 'UGCS Akai Dispenser',
            'tag' => 'UG/UGCS/LAB/01',
            'type_id' => 3,
            'brand' => 'Akai',
            'user_name' => 'Jonathan Armah',
            'parent_id' => 4,
            'location_id' => 1,
            'date_commenced' => date('y-m-d'),
            'date_disposed' => date('y-m-d'),
            'date_acquired' => date('y-m-d'),
            'added_by_id' => 1,
        ]);

        DB::table('assets')->insert([
            'name' => 'UGCS Lab4A Table 1',
            'tag' => 'LAB/4A/TB/01',
            'type_id' => 5,
            
            'user_name' => 'Shirley Boateng',
            'parent_id' => 4,
            'location_id' => 1,
            'date_commenced' => date('y-m-d'),
            'date_disposed' => date('y-m-d'),
            'date_acquired' => date('y-m-d'),
            'added_by_id' => 1,
        ]);

         DB::table('assets')->insert([
            'name' => 'JNH Tut Off Air Conditioner',
            'tag' => 'JN/NL/TOFF/AC',
            'type_id' => 3,
            'brand' => 'Samsung',
            'user_name' => 'Kwamena Mensah',
            
            'location_id' => 1,
            'date_commenced' => date('y-m-d'),
            'date_disposed' => date('y-m-d'),
            'date_acquired' => date('y-m-d'),
            'added_by_id' => 1,
        ]);

        DB::table('assets')->insert([
            'name' => 'Acc General PC 3',
            'tag' => 'AC/GN/PC/03',
            'type_id' => 5,
            'brand' => 'HP',
            'user_name' => 'Blake Laryea',
            'parent_id' => 4,
            'location_id' => 10,
            'date_commenced' => date('y-m-d'),
            'date_disposed' => date('y-m-d'),
            'date_acquired' => date('y-m-d'),
            'added_by_id' => 1,
        ]);

       
    }
}
