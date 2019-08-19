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
            'username' => 'James Baah',
            'email' => 'ghana@gmail.com',
            'password' => Hash::make('nana'),
            'added_by_id' =>'1',
        ]);

        DB::table('users')->insert([
            'username' => 'Prince charles',
            'email' => 'princy@gmail.com',
            'password' => Hash::make('chacha'),
            'added_by_id' =>'1',
        ]);

        DB::table('users')->insert([
            'username' => 'Lydia Amaaley',
            'email' => 'lydama@yahoo.com',
            'password' =>Hash::make ('lydialydia'),
            'added_by_id' =>'1',
        ]);

        DB::table('users')->insert([
            'username' => 'Philomena Agyei',
            'email' => 'phil@gmail.com',
            'password' =>Hash::make('kwesi'),
            'added_by_id' =>'1',
        ]);

        DB::table('users')->insert([
            'username' => 'William Ato',
            'email' => 'williwilli@gmail.com',
            'password' => Hash::make('asdgas'),
            'added_by_id' =>'1',
        ]);

        DB::table('users')->insert([
            'username' => 'Nana Agyemang',
            'email' => 'nanakay@live.com',
            'password' =>Hash::make('kwesi'),
            'added_by_id' =>'1',
        ]);

        DB::table('users')->insert([
            'username' => 'Cudjoe Senyo',
            'email' => 'cudge@gmail.com',
            'password' =>Hash::make('kwesi'),
            'added_by_id' =>'1',
        ]);
    }
}
