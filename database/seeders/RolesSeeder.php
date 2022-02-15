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
            'value' => 'assets/img/default-image.jpg',
        ]);

        Settings::create([
            'name' => 'logo',
            'display_name' => 'Logo',
            'value' => 'assets/img/default-image.jpg',
        ]);

        Settings::create([
            'name' => 'wallpaper.auth',
            'display_name' => 'Login/Register Background Wallpaper',
            'value' => 'assets/img/mozaic-wallpaper.jpg',
        ]);

        Settings::create([
            'name' => 'color.primary.hex',
            'display_name' => 'Primary Color Hex',
            'value' => '#345d6a',
        ]);

        Settings::create([
            'name' => 'color.secondary.hex',
            'display_name' => 'secondary Color Hex',
            'value' => '#6c757d',
        ]);

        Settings::create([
            'name' => 'color.success.hex',
            'display_name' => 'success Color Hex',
            'value' => '#198754',
        ]);

        Settings::create([
            'name' => 'color.info.hex',
            'display_name' => 'info Color Hex',
            'value' => '#0dcaf0',
        ]);

        Settings::create([
            'name' => 'color.warning.hex',
            'display_name' => 'warning Color Hex',
            'value' => '#ffc107',
        ]);

        Settings::create([
            'name' => 'color.danger.hex',
            'display_name' => 'danger Color Hex',
            'value' => '#dc3545',
        ]);

        Settings::create([
            'name' => 'color.primary.rgb',
            'display_name' => 'Primary Color',
            'value' => '52,93,106',
        ]);

        Settings::create([
            'name' => 'color.secondary.rgb',
            'display_name' => 'Secondary Color',
            'value' => '108,117,125',
        ]);

        Settings::create([
            'name' => 'color.success.rgb',
            'display_name' => 'Success Color',
            'value' => '25,135,84',
        ]);

        Settings::create([
            'name' => 'color.info.rgb',
            'display_name' => 'Info Color',
            'value' => '13,202,240',
        ]);

        Settings::create([
            'name' => 'color.warning.rgb',
            'display_name' => 'Warning Color',
            'value' => '255,193,7',
        ]);

        Settings::create([
            'name' => 'color.danger.rgb',
            'display_name' => 'Danger Color',
            'value' => '220,53,69',
        ]);
    }
}