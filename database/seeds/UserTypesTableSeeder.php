<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'name' => 'Technician',
            'added_by_id' => 1
        ]);

        DB::table('user_types')->insert([
            'name' => 'Custodian',
            'added_by_id' => 1
        ]);

        DB::table('user_types')->insert([
            'name' => 'Administrator',
            'added_by_id' => 1
        ]);

        DB::table('user_types')->insert([
            'name' => 'Super User',
            'added_by_id' => 1
        ]);
    }
}
