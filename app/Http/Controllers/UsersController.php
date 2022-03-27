<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserActivity;
use App\Models\Country;
use App\Models\Role;
use App\Providers\UserActivityEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', 1)->get();

        $count = 1;

        return view('user.index', compact('users', 'count'));
    }

    public function activityAll(Request $request)
    {
        $activities = UserActivity::all();

        $count = 1;

        $all = true;

        return view('user.user_activity', compact('activities', 'count', 'all'));
    }

    public function add(Request $request)
    {
        try {
            Validator::make((array)$request->all(), [
                'full_name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            User::create([
                'full_name' => $request->full_name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return back()->with('success', 'User ' . $request->username  .  '(' . $request->email . ') registration success!');
        } catch (\Throwable $th) {

            if (str_contains($th, 'Duplicate entry')) {
                $th = 'Duplicate entry. Username or email already registered.';
            }

            return back()->with('error', $th);
        }
    }

    public function view(Request $request)
    {
        if ($request->action == "profile") {
            $user = User::where('id', $request->id)->first();

            $countries = Country::all();

            $country = Country::where('id', $user->country_id)->first();

            $birthday = $user->birthday == null ? null : $user->birthday->format('Y-m-d');

            $roles = Role::where('id', '!=', 1)->get();

            return view('user.user_profile', compact('user', 'birthday', 'country'));
        } elseif ($request->action == "edit") {
            $user = User::where('id', $request->id)->first();

            $countries = Country::all();

            $country = Country::where('id', $user->country_id)->first();

            $birthday = $user->birthday == null ? null : $user->birthday->format('Y-m-d');

            $roles = Role::where('id', '!=', 1)->get();

            return view('user.user_edit', compact('user', 'birthday', 'countries', 'roles'));
        } elseif ($request->action == "activity") {
            $activities = UserActivity::where('user_id', $request->id)->orderBy('created_at', 'desc')->get();

            $count = 1;

            return view('user.user_activity', compact('activities', 'count'));
        }

        return back();
    }

    public function avatar(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if user already has avatar
        if (File::exists(public_path($user->avatar))) {
            File::delete(public_path($user->avatar));
        }

        // creating name and path for the file
        // time() is current unix timestamp
        $fileName = $user->id . '_' . time() . '_' . $request->file('avatar')->getClientOriginalName();

        // storing file in public/upload/avatar
        $request->avatar->move(public_path('upload/avatar'), $fileName);

        // updating user details in db
        User::where('id', $user->id)
            ->update([
                'avatar' => 'upload/avatar/' . $fileName,
            ]);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Edit user ' . $user->email . '(id: ' . $user->id . ')' . ' avatar'));

        return back()->with('success', 'Avatar uploaded successfully!');
    }

    public function edit(Request $request)
    {
        $update = $request->all();
        $user = User::where('id', $request->id)->first();

        unset($update['_token']);

        // updating profile details in db
        User::where('id', $user->id)
            ->update($update);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Edit user ' . $user->email . '(id: ' . $user->id . ')' . ' profile details'));

        return back()->with('success', 'Profile details updated!');
    }

    public function ban(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        // change user status in db
        User::where('id', $user->id)
            ->update([
                'status' => $request->status,
            ]);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Update user ' . $user->email . '(id: ' . $user->id . ')' . ' to ' . $request->status));

        return back()->with('success', 'User status has been changed to ' . $request->status);
    }

    public function delete(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        // soft delete in db
        User::where('id', $user->id)
            ->delete();


        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Delete user ' . $user->email . '(id: ' . $user->id . ')'));

        return back()->with('success', 'User ' .  $user->username . ' has been successfully deleted');
    }
}