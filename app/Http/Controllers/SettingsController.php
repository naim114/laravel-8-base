<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Providers\UserActivityEvent;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function update(Request $request)
    {
        try {
            Settings::where('name', 'app-name')
                ->update([
                    'value' => $request->app_name,
                ]);

            Settings::where('name', 'copyright')
                ->update([
                    'value' => $request->copyright,
                ]);

            Settings::where('name', 'privacy-policy')
                ->update([
                    'value' => $request->privacy_policy,
                ]);

            Settings::where('name', 'terms-conditions')
                ->update([
                    'value' => $request->terms_conditions,
                ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Updating app name, privacy policy, terms & condition and copyright.'));

        return back()->with('success', 'Application successfully updated!');
    }
}