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

    public function storeAvatar(Request $request)
    {
        $user = Auth::user();
        $countries = Country::all();

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
            $successmsg = $th;

            return view('profile.index', compact('user', 'countries', 'errormsg'));
        }

        // updating user details in db
        $user->avatar =  'upload/avatar/' . $fileName;
        $user->save();

        // user activity log
        event(new UserActivityEvent($user, $request, 'Change avatar'));

        $successmsg = 'Avatar uploaded successfully!';

        // TODO change this to redirect to route index with var
        return view('profile.index', compact('user', 'countries', 'successmsg'));
    }
}
