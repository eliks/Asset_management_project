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
			'user_name' => 'Akos Mensah',
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
			'user_name' => 'John Ziba',
            'parent_id' => 1,
            'location_id' => 1,
            'date_commenced' => date('y-m-d'),
            'date_disposed' => date('y-m-d'),
            'date_acquired' => date('y-m-d'),
            'added_by_id' => 1,
        ]);
    }
}
