<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use App\Providers\UserActivityEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $countries = Country::all();

        $birthday = $user->birthday == null ? null : $user->birthday->format('Y-m-d');

        return view('profile.index', compact('user', 'countries', 'birthday'));
    }

    /**
     * Change avatar/profile picture for user
     */
    public function storeAvatar(Request $request)
    {
        $user = Auth::user();

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
        try {
            $request->avatar->move(public_path('upload/avatar'), $fileName);

            // updating user details in db
            User::where('id', $user->id)
                ->update([
                    'avatar' => 'upload/avatar/' . $fileName,
                ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent($user, $request, 'Update avatar'));

        return back()->with('success', 'Avatar uploaded successfully!');
    }

    public function updateProfile(Request $request)
    {
        $update = $request->all();
        unset($update['_token']);

        // updating profile details in db
        User::where('id', Auth::user()->id)
            ->update($update);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Update profile details'));

        return back()->with('success', 'Profile details updated!');
    }

    public function updateAuth(Request $request)
    {
        $update = $request->all();
        $user = Auth::user();

        // check if there is changes for username
        if ($user->username != $update['username']) {
            // check if username already taken
            $check = User::where('username', $update['username'])->count();

            if ($check > 0) {
                return back()->with('error', 'Username entered are already taken');
            }
        }

        // check if current password is correct
        if ($user->email == $update['email'] && Hash::check($update['password'], $user->password)) {
            // updating username and password

            try {
                User::where('id', $user->id)
                    ->update([
                        'username' => $update['username'],
                        'password' => Hash::make($update['new_password']),
                    ]);
            } catch (\Throwable $th) {
                return back()->with('error', $th);
            }

            // user activity log
            event(new UserActivityEvent(Auth::user(), $request, 'Update login details'));

            return back()->with('success', 'Login details updated!');
        } else {
            return back()->with('error', 'Email or password is incorrect');
        }
    }
}