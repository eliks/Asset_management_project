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
            'name'=> 'Desktop',
            'tag'=> 'ugcs/lab4main/desk2',
            'brand'=> 'Dell',
            'user_name'=> 'Kobbina',
            'parent_id'=>'2',
            'location_id'=>'2',
            'date_commenced'=>'1998-04-23',
            'date_disposed'=> '1999-03-16',
            'date_acquired'=>'1970-01-23',
            'added_by_id'=> '1'
        ]);
    }
}
