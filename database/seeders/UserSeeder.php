<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Support\Enum\UserStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::where('name', 'Super Admin')->first();
        $admin = Role::where('name', 'Admin')->first();
        $user = Role::where('name', 'User')->first();

        User::create([
            'full_name' => 'Super Admin',
            'email' => 'superadmin@email.com',
            'username' => 'superadmin',
            'password' => Hash::make('liveforever'),
            'avatar' => null,
            'country_id' => null,
            'role_id' => $super_admin->id,
            'status' => UserStatus::ACTIVE
        ]);

        User::create([
            'full_name' => 'Admin 1',
            'email' => 'admin1@gmailya.com',
            'username' => 'admin1',
            'password' => Hash::make('admin1@gmailya.com'),
            'avatar' => null,
            'country_id' => null,
            'role_id' => $admin->id,
            'status' => UserStatus::ACTIVE
        ]);

        User::create([
            'full_name' => 'Dude 1',
            'email' => 'dude1@gmailya.com',
            'username' => 'dude1',
            'password' => Hash::make('dude1@gmailya.com'),
            'avatar' => null,
            'country_id' => null,
            'role_id' => $user->id,
            'status' => UserStatus::ACTIVE
        ]);
    }
}