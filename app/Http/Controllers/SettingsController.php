<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Providers\UserActivityEvent;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        $app_name = Config::get('app.name');

        return view('settings.index', compact('app_name'));
    }

    public function change_app_name(Request $request)
    {
        // TODO DOES NOT WORK IN RUNTIME
        // updating application name in .env file
        try {
            Config::set('app.name', $request->app_name);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Update application name to ' . $request->app_name));

        return back()->with('success', 'Application name has been changed to ' . $request->app_name);
    }
}
