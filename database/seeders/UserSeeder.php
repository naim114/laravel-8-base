<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Support\Enum\UserStatus;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', 'Admin')->first();

        User::create([
            'first_name' => 'Admin',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => 'admin123',
            'hash' => sha1('admin@example.com'),
            'avatar' => null,
            'country_id' => null,
            'role_id' => $admin->id,
            'status' => UserStatus::ACTIVE
        ]);
    }
}
