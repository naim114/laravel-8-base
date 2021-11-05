<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Providers\UserActivityEvent;
use Illuminate\Support\Facades\Auth;

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
        try {
            Permission::create($add);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Add permission'));

        return back()->with('success', 'Permission successfully added!');
    }

    public function edit(Request $request)
    {
        $update = $request->all();
        unset($update['_token']);

        // updating permission in db
        try {
            Permission::where('id', $update['id'])
                ->update($update);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

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
        try {
            Permission::where('id', $request->id)
                ->delete();
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Delete permission ' . $permission->name . '(id: ' . $permission->id . ')'));

        return back()->with('success', 'Permission ' .  $permission->name . ' has been successfully deleted');
    }
}
