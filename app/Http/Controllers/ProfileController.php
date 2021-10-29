<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use App\Providers\UserActivityEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $countries = Country::all();

        return view('profile.index', compact('user', 'countries'));
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
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // updating user details in db
        User::where('id', $user->id)
            ->update([
                'avatar' => 'upload/avatar/' . $fileName,
            ]);

        // user activity log
        event(new UserActivityEvent($user, $request, 'Change avatar'));

        return back()->with('success', 'Avatar uploaded successfully!');
    }

    public function updateProfile(Request $request)
    {
        $update = $request->all();
        unset($update['_token']);

        // updating profile details in db

        try {
            User::where('id', Auth::user()->id)
                ->update($update);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Update profile details'));

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updateAuth(Request $request)
    {
        # code...
    }
}
