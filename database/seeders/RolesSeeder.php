<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Settings;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Super Admin',
            'display_name' => 'Super Admin',
            'description' => 'Total control administrator.',
            'removable' => false
        ]);

        Role::create([
            'name' => 'Admin',
            'display_name' => 'Admin',
            'description' => 'System administrator.',
            'removable' => false
        ]);

        Role::create([
            'name' => 'User',
            'display_name' => 'User',
            'description' => 'Default system user.',
            'removable' => false
        ]);

        Settings::create([
            'name' => 'app-name',
            'display_name' => 'Application Name',
            'value' => 'Laravel Base',
        ]);

        Settings::create([
            'name' => 'copyright',
            'display_name' => 'Copyright',
            'value' => 'https://github.com/naim114',
        ]);

        Settings::create([
            'name' => 'privacy-policy',
            'display_name' => 'Privacy Policy',
            'value' => 'https://github.com/naim114',
        ]);

        Settings::create([
            'name' => 'terms-conditions',
            'display_name' => 'Terms & Conditions',
            'value' => 'https://github.com/naim114',
        ]);

        Settings::create([
            'name' => 'favicon',
            'display_name' => 'Favicon',
            'value' => 'assets/icons/favicon-32x32.png',
        ]);

        Settings::create([
            'name' => 'logo',
            'display_name' => 'Logo',
            'value' => 'assets/img/unikl.png',
        ]);
    }
}