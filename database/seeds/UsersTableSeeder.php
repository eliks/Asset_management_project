<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'=>'Clinton Lartey',
            'email'=> 'sambotwe@gmail.com',
            'password'=> Hash::make('shakes18') ,
            'organization_id'=> '1',
            'type_id'=> '1',
            'added_by_id'=> '1',
        ]);
    }
}
