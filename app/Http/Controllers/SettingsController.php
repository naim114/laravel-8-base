<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Providers\UserActivityEvent;
use Illuminate\Support\Facades\File;
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

    public function logo(Request $request)
    {
        $settings = Settings::where('name', 'logo')->first();

        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if user already has logo
        if (File::exists(public_path($settings->value)) && $settings->value != 'assets/img/unikl.png') {
            File::delete(public_path($settings->value));
        }

        // creating name and path for the file
        // time() is current unix timestamp
        $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();

        try {
            $request->logo->move(public_path('upload/logo'), $fileName);

            // updating details in db
            Settings::where('name', 'logo')
                ->update([
                    'value' => 'upload/logo/' . $fileName,
                ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Change application logo.'));

        return back()->with('success', 'Logo successfully updated!');
    }

    public function favicon(Request $request)
    {
        $settings = Settings::where('name', 'favicon')->first();

        $request->validate([
            'favicon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if user already has favicon
        if (File::exists(public_path($settings->value)) && $settings->value != 'assets/icons/favicon-32x32.png') {
            File::delete(public_path($settings->value));
        }

        // creating name and path for the file
        // time() is current unix timestamp
        $fileName = time() . '_' . $request->file('favicon')->getClientOriginalName();

        try {
            $request->favicon->move(public_path('upload/favicon'), $fileName);

            // updating details in db
            Settings::where('name', 'favicon')
                ->update([
                    'value' => 'upload/favicon/' . $fileName,
                ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Change favicon logo.'));

        return back()->with('success', 'Favicon successfully updated!');
    }
}