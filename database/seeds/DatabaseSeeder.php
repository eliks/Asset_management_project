<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AssetRegistrationLinkTypeSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AssetsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(UserLocationsTableSeeder::class);
        $this->call(MaintenanceActivitiesSeeder::class);
        $this->call(AssetTypeSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
    }
}
