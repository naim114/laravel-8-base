<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserActivity;
use App\Models\Country;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        $count = 1;

        return view('user.index', compact('users', 'count'));
    }

    public function activityLog(Request $request)
    {
        $activities = UserActivity::where('user_id', $request->id)->get();

        $count = 1;

        return view('user.user_activity', compact('activities', 'count'));
    }

    public function view(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        $countries = Country::all();

        $country = Country::where('id', $user->country_id)->first();

        $birthday = $user->birthday == null ? null : $user->birthday->format('Y-m-d');

        if ($request->action == "profile") {
            return view('user.user_profile', compact('user', 'birthday', 'country'));
        } elseif ($request->action == "edit") {
            return view('user.user_edit', compact('user', 'birthday', 'countries'));
        }

        return back();
    }

    public function edit()
    {
        # code...
    }
}
