<?php

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// if (!function_exists('user_email')) {
//     function user_email()
//     {
//         return Auth::user()->email;
//     }
// }

/**
 * @param permissions (String)
 * @return bool
 */
if (!function_exists('has_permission')) {
    function has_permission($permission)
    {
        $role_id = Auth::user()->role_id;
        $permission = Permission::where('name', $permission)->first();
        $permission_id = $permission->id;

        $query = DB::table('permission_role')
            ->where('role_id', $role_id)
            ->where('permission_id', $permission_id)
            ->count();

        if ($query == null) {
            return false;
        }

        return true;
    }
}
