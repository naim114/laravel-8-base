<?php

namespace Database\Seeders;

use App\Models\PermissionRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert(array(
            'permission_id' => 1,
            'role_id' => 1,
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 2,
            'role_id' => 1,
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 3,
            'role_id' => 1,
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 4,
            'role_id' => 1,
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 5,
            'role_id' => 1,
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 6,
            'role_id' => 1,
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 7,
            'role_id' => 1,
        ));

        // PermissionRole::create([
        //     'permission_id' => 1,
        //     'role_id' => 1,
        // ]);

        // PermissionRole::create([
        //     'permission_id' => 2,
        //     'role_id' => 1,
        // ]);

        // PermissionRole::create([
        //     'permission_id' => 3,
        //     'role_id' => 1,
        // ]);

        // PermissionRole::create([
        //     'permission_id' => 4,
        //     'role_id' => 1,
        // ]);

        // PermissionRole::create([
        //     'permission_id' => 5,
        //     'role_id' => 1,
        // ]);

        // PermissionRole::create([
        //     'permission_id' => 6,
        //     'role_id' => 1,
        // ]);

        // PermissionRole::create([
        //     'permission_id' => 7,
        //     'role_id' => 1,
        // ]);
    }
}
