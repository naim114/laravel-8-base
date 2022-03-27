<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Providers\UserActivityEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        $count = 1;

        return view('permissions.index', compact('permissions', 'count'));
    }

    public function add(Request $request)
    {
        $add = $request->all();

        // name has to be unique
        $request->validate([
            'name' => 'required|unique:permissions|max:255',
        ]);

        // add permission in db
        Permission::create($add);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Add permission'));

        return back()->with('success', 'Permission successfully added!');
    }

    public function edit(Request $request)
    {
        $update = $request->all();
        unset($update['_token']);

        // updating permission in db
        Permission::where('id', $update['id'])
            ->update($update);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Update permission ' . $request->name . '(id: ' . $request->id . ')'));

        return back()->with('success', 'Permission successfully updated!');
    }

    public function delete(Request $request)
    {
        $permission = Permission::where('id', $request->id)
            ->first();

        // check if permission is removeable
        if (!$permission->removable) {
            return back()->with('error', "This permission can't be remove!");
        }

        // soft delete in db
        Permission::where('id', $request->id)
            ->delete();

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Delete permission ' . $permission->name . '(id: ' . $permission->id . ')'));

        return back()->with('success', 'Permission ' .  $permission->name . ' has been successfully deleted');
    }

    public function permission_role(Request $request)
    {
        $permission = Permission::where('id', $request->id)->first();

        $list = DB::table('permission_role')
            ->where('permission_id', $request->id)
            ->join('roles', 'permission_role.role_id', '=', 'roles.id')
            ->get();

        $count = 1;

        $roles = Role::all()->toArray();

        foreach ($list as $role) {
            foreach ($roles as $key => $value) {
                if ($role->id == $value['id']) {
                    unset($roles[$key]);
                }
            }
        }

        return view('permissions.permission-role', compact('list', 'permission', 'count', 'roles'));
    }

    public function permission_role_add(Request $request)
    {
        // add permission in db
        PermissionRole::create([
            'permission_id' => $request->permission_id,
            'role_id' => $request->role_id,
        ]);

        event(new UserActivityEvent(Auth::user(), $request, 'Add permission role (permission id: ' . $request->permission_id . ', role id:' . $request->role_id . ')'));

        return back()->with('success', 'Role has been added to the permission list');
    }

    public function permission_role_delete(Request $request)
    {
        // force delete in db
        PermissionRole::where('permission_id', $request->permission_id)
            ->where('role_id', $request->role_id)
            ->forceDelete();

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Delete permission role (permission id: ' . $request->permission_id . ', role id:' . $request->role_id . ')'));

        return back()->with('success', 'Role has been successfully deleted from permission list');
    }
}