<?php

use App\Models\Permission;
use App\Models\User;
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

if (!function_exists('get_user_detail')) {
    function get_user_detail($id, $detail)
    {
        $user = User::where('id', $id)
            ->first();

        echo $user->$detail;
    }
}

if (!function_exists('hex2rgb')) {
    function hex2rgb($hex)
    {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        return implode(",", $rgb); // returns the rgb values separated by commas
        // return $rgb; // returns an array with the rgb values
    }
}

if (!function_exists('rgb2hex')) {
    function rgb2hex($rgb)
    {
        $rgbarr = explode(",", $rgb, 3);
        echo sprintf("#%02x%02x%02x", $rgbarr[0], $rgbarr[1], $rgbarr[2]);
    }
}