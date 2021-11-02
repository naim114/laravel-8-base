<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $role_id = $request->user()->role_id;
        $permission = Permission::where('name', $permission)->first();
        $permission_id = $permission->id;

        $query = DB::table('permission_role')
            ->where('role_id', $role_id)
            ->where('permission_id', $permission_id)
            ->count();

        if ($query == null) {
            // abort(403, "Forbidden.");
            return back();
        }

        return $next($request);
    }
}
