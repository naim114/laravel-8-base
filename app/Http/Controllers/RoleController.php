<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Providers\UserActivityEvent;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        $count = 1;

        return view('roles.index', compact('roles', 'count'));
    }

    public function add(Request $request)
    {
        $add = $request->all();

        // add role in db
        Role::create($add);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Add role'));

        return back()->with('success', 'Role successfully added!');
    }

    public function edit(Request $request)
    {
        $update = $request->all();
        unset($update['_token']);

        // updating role in db
        Role::where('id', $update['id'])
            ->update($update);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Update role ' . $request->name . '(id: ' . $request->id . ')'));

        return back()->with('success', 'Role successfully updated!');
    }

    public function delete(Request $request)
    {
        $role = Role::where('id', $request->id)
            ->first();

        // check if role is removeable
        if (!$role->removable) {
            return back()->with('error', "This role can't be remove!");
        }

        // soft delete in db
        Role::where('id', $request->id)
            ->delete();

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Delete role ' . $role->name . '(id: ' . $role->id . ')'));

        return back()->with('success', 'Role ' .  $role->name . ' has been successfully deleted');
    }
}