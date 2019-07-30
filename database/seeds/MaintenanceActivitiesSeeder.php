<?php

use Illuminate\Database\Seeder;

class MaintenanceActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maintenance_activities')->insert([
        	
        	'asset_id' => 2,
        	
        	'maintained_by' => 'Zenabu Kamal',
        	'supervised_by' => 'Bless Martey',
        	'description' => 'Motherboard changed',
        	'cost' => '7000',
        	'comment' => 'This was a serious fault and device need critical attention',
        	'location' => 'UGCS',
        	'added_by_id' => 2
        ]);

          DB::table('maintenance_activities')->insert([
        	
        	'asset_id' => 3,
        	
        	'maintained_by' => 'Ibrahim Yussif',
        	'supervised_by' => 'Sharon Yamesor',
        	'description' => 'New keyboard attached',
        	'cost' => '200',
        	'comment' => 'New item bought',
        	'location' => 'Account Office',
        	'added_by_id' => 3
        ]);
    }
}
