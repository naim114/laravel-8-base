<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Model::unguard();

        $this->call(CountriesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(UserSeeder::class);

        Model::reguard();
    }
}
