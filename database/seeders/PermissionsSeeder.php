<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions[] = Permission::create([
            'name' => 'users.manage',
            'display_name' => 'Manage Users',
            'description' => 'Manage users and their sessions.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'users.activity',
            'display_name' => 'View System Activity Log',
            'description' => 'View activity log for all system users.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'roles.manage',
            'display_name' => 'Manage Roles',
            'description' => 'Manage system roles.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'permissions.manage',
            'display_name' => 'Manage Permissions',
            'description' => 'Manage role permissions.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'settings.general',
            'display_name' => 'Update General System Settings',
            'description' => '',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'dashboard',
            'display_name' => 'View Dashboard of Overall System Statistic',
            'description' => '',
            'removable' => false
        ]);

        // $adminRole->attachPermissions($permissions);

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
    }
}
