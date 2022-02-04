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


    public function color(Request $request)
    {
        $req = $request->all();
        unset($req['_token']);

        $update['color.primary.hex'] = $request->primary_color;
        $update['color.primary'] = hex2rgb($request->primary_color);
        $update['color.secondary'] = hex2rgb($request->secondary_color);
        $update['color.success'] = hex2rgb($request->success_color);
        $update['color.info'] = hex2rgb($request->info_color);
        $update['color.warning'] = hex2rgb($request->warning_color);
        $update['color.danger'] = hex2rgb($request->danger_color);

        try {
            Settings::where('name', 'color.primary.hex')
                ->update([
                    'value' => $update['color.primary.hex'],
                ]);

            Settings::where('name', 'color.primary')
                ->update([
                    'value' => $update['color.primary'],
                ]);

            Settings::where('name', 'color.secondary')
                ->update([
                    'value' => $update['color.secondary'],
                ]);

            Settings::where('name', 'color.success')
                ->update([
                    'value' => $update['color.success'],
                ]);

            Settings::where('name', 'color.info')
                ->update([
                    'value' => $update['color.info'],
                ]);

            Settings::where('name', 'color.warning')
                ->update([
                    'value' => $update['color.warning'],
                ]);

            Settings::where('name', 'color.danger')
                ->update([
                    'value' => $update['color.danger'],
                ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Updating application color '));

        return back()->with('success', 'Application color successfully updated!');
    }

    public function color_default(Request $request)
    {
        $update['color.primary.hex'] = '#345d6a';
        $update['color.primary'] = '52,93,106';
        $update['color.secondary'] = '108,117,125';
        $update['color.success'] = '25,135,84';
        $update['color.info'] = '13,202,240';
        $update['color.warning'] = '255,193,7';
        $update['color.danger'] = '220,53,69';

        try {
            Settings::where('name', 'color.primary.hex')
                ->update([
                    'value' => $update['color.primary.hex'],
                ]);

            Settings::where('name', 'color.primary')
                ->update([
                    'value' => $update['color.primary'],
                ]);

            Settings::where('name', 'color.secondary')
                ->update([
                    'value' => $update['color.secondary'],
                ]);

            Settings::where('name', 'color.success')
                ->update([
                    'value' => $update['color.success'],
                ]);

            Settings::where('name', 'color.info')
                ->update([
                    'value' => $update['color.info'],
                ]);

            Settings::where('name', 'color.warning')
                ->update([
                    'value' => $update['color.warning'],
                ]);

            Settings::where('name', 'color.danger')
                ->update([
                    'value' => $update['color.danger'],
                ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Updating application color back to default'));

        return back()->with('success', 'Application color successfully updated to default!');
    }

    public function logo(Request $request)
    {
        $settings = Settings::where('name', 'logo')->first();

        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if user already has logo
        if (File::exists(public_path($settings->value)) && $settings->value != 'assets/img/default-profile-picture.jpg' && $settings->value != 'default-profile-picture.png') {
            if (!str_contains(public_path($settings->value), "assets/icons/favicon-32x32.png") && !str_contains(public_path($settings->value), "assets/img/default-profile-picture.png") && !str_contains(public_path($settings->value), "assets/img/default-image.jpg")) {
                File::delete(public_path($settings->value));
            }
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
        event(new UserActivityEvent(Auth::user(), $request, 'Update application logo.'));

        return back()->with('success', 'Logo successfully updated!');
    }

    public function favicon(Request $request)
    {
        $settings = Settings::where('name', 'favicon')->first();

        $request->validate([
            'favicon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if user already has favicon
        if (File::exists(public_path($settings->value))) {
            if (!str_contains(public_path($settings->value), "assets/icons/favicon-32x32.png") && !str_contains(public_path($settings->value), "assets/img/default-profile-picture.png") && !str_contains(public_path($settings->value), "assets/img/default-image.jpg")) {
                File::delete(public_path($settings->value));
            }
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
        event(new UserActivityEvent(Auth::user(), $request, 'Update favicon logo.'));

        return back()->with('success', 'Favicon successfully updated!');
    }
}