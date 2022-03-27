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

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Updating app name, privacy policy, terms & condition and copyright.'));

        return back()->with('success', 'Application successfully updated!');
    }


    public function color(Request $request)
    {
        $req = $request->all();
        unset($req['_token']);

        $update['color.primary.hex'] = $request->primary_color;
        $update['color.secondary.hex'] = $request->secondary_color;
        $update['color.success.hex'] = $request->success_color;
        $update['color.info.hex'] = $request->info_color;
        $update['color.warning.hex'] = $request->warning_color;
        $update['color.danger.hex'] = $request->danger_color;

        $update['color.primary.rgb'] = hex2rgb($request->primary_color);
        $update['color.secondary.rgb'] = hex2rgb($request->secondary_color);
        $update['color.success.rgb'] = hex2rgb($request->success_color);
        $update['color.info.rgb'] = hex2rgb($request->info_color);
        $update['color.warning.rgb'] = hex2rgb($request->warning_color);
        $update['color.danger.rgb'] = hex2rgb($request->danger_color);

        Settings::where('name', 'color.primary.hex')
            ->update([
                'value' => $update['color.primary.hex'],
            ]);

        Settings::where('name', 'color.secondary.hex')
            ->update([
                'value' => $update['color.secondary.hex'],
            ]);

        Settings::where('name', 'color.success.hex')
            ->update([
                'value' => $update['color.success.hex'],
            ]);

        Settings::where('name', 'color.info.hex')
            ->update([
                'value' => $update['color.info.hex'],
            ]);

        Settings::where('name', 'color.warning.hex')
            ->update([
                'value' => $update['color.warning.hex'],
            ]);

        Settings::where('name', 'color.danger.hex')
            ->update([
                'value' => $update['color.danger.hex'],
            ]);

        Settings::where('name', 'color.primary.rgb')
            ->update([
                'value' => $update['color.primary.rgb'],
            ]);

        Settings::where('name', 'color.secondary.rgb')
            ->update([
                'value' => $update['color.secondary.rgb'],
            ]);

        Settings::where('name', 'color.success.rgb')
            ->update([
                'value' => $update['color.success.rgb'],
            ]);

        Settings::where('name', 'color.info.rgb')
            ->update([
                'value' => $update['color.info.rgb'],
            ]);

        Settings::where('name', 'color.warning.rgb')
            ->update([
                'value' => $update['color.warning.rgb'],
            ]);

        Settings::where('name', 'color.danger.rgb')
            ->update([
                'value' => $update['color.danger.rgb'],
            ]);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Updating application color '));

        return back()->with('success', 'Application color successfully updated!');
    }

    public function color_default(Request $request)
    {
        $update['color.primary.hex'] = '#345d6a';
        $update['color.secondary.hex'] = '#6c757d';
        $update['color.success.hex'] = '#198754';
        $update['color.info.hex'] = '#0dcaf0';
        $update['color.warning.hex'] = '#ffc107';
        $update['color.danger.hex'] = '#dc3545';

        $update['color.primary.rgb'] = '52,93,106';
        $update['color.secondary.rgb'] = '108,117,125';
        $update['color.success.rgb'] = '25,135,84';
        $update['color.info.rgb'] = '13,202,240';
        $update['color.warning.rgb'] = '255,193,7';
        $update['color.danger.rgb'] = '220,53,69';

        Settings::where('name', 'color.primary.hex')
            ->update([
                'value' => $update['color.primary.hex'],
            ]);

        Settings::where('name', 'color.secondary.hex')
            ->update([
                'value' => $update['color.secondary.hex'],
            ]);

        Settings::where('name', 'color.success.hex')
            ->update([
                'value' => $update['color.success.hex'],
            ]);

        Settings::where('name', 'color.info.hex')
            ->update([
                'value' => $update['color.info.hex'],
            ]);

        Settings::where('name', 'color.warning.hex')
            ->update([
                'value' => $update['color.warning.hex'],
            ]);

        Settings::where('name', 'color.danger.hex')
            ->update([
                'value' => $update['color.danger.hex'],
            ]);

        Settings::where('name', 'color.primary.rgb')
            ->update([
                'value' => $update['color.primary.rgb'],
            ]);

        Settings::where('name', 'color.secondary.rgb')
            ->update([
                'value' => $update['color.secondary.rgb'],
            ]);

        Settings::where('name', 'color.success.rgb')
            ->update([
                'value' => $update['color.success.rgb'],
            ]);

        Settings::where('name', 'color.info.rgb')
            ->update([
                'value' => $update['color.info.rgb'],
            ]);

        Settings::where('name', 'color.warning.rgb')
            ->update([
                'value' => $update['color.warning.rgb'],
            ]);

        Settings::where('name', 'color.danger.rgb')
            ->update([
                'value' => $update['color.danger.rgb'],
            ]);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Updating application color back to default'));

        return back()->with('success', 'Application color successfully updated to default!');
    }

    public function wallpaper_auth(Request $request)
    {
        $settings = Settings::where('name', 'wallpaper.auth')->first();

        $request->validate([
            'wallpaper' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (File::exists(public_path($settings->value)) && $settings->value != 'assets/img/mozaic-wallpaper.jpg') {
            if (!str_contains(public_path($settings->value), "assets/img/mozaic-wallpaper.jpg")) {
                File::delete(public_path($settings->value));
            }
        }

        // creating name and path for the file
        // time() is current unix timestamp
        $fileName = time() . '_auth_' . $request->file('wallpaper')->getClientOriginalName();

        try {
            $request->wallpaper->move(public_path('upload/wallpaper'), $fileName);

            // updating details in db
            Settings::where('name', 'wallpaper.auth')
                ->update([
                    'value' => 'upload/wallpaper/' . $fileName,
                ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Update auth wallpaper'));

        return back()->with('success', 'Auth wallpaper successfully updated!');
    }

    public function logo(Request $request)
    {
        $settings = Settings::where('name', 'logo')->first();

        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

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

        if (File::exists(public_path($settings->value))) {
            if (!str_contains(public_path($settings->value), "assets/icons/favicon-32x32.png") && !str_contains(public_path($settings->value), "assets/img/default-profile-picture.png") && !str_contains(public_path($settings->value), "assets/img/default-image.jpg")) {
                File::delete(public_path($settings->value));
            }
        }

        // creating name and path for the file
        // time() is current unix timestamp
        $fileName = time() . '_' . $request->file('favicon')->getClientOriginalName();

        $request->favicon->move(public_path('upload/favicon'), $fileName);

        // updating details in db
        Settings::where('name', 'favicon')
            ->update([
                'value' => 'upload/favicon/' . $fileName,
            ]);


        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Update favicon logo.'));

        return back()->with('success', 'Favicon successfully updated!');
    }
}