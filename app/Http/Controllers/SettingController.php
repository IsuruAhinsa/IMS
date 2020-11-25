<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function settings()
    {
        $setting = Setting::getSettings();
        return view('settings.index')->with(compact('setting'));
    }

    public function updateSettings(Request $request)
    {
        $setting = Setting::getSettings();

        $setting->user_id = Auth::id();
        $setting->navbar_color = $request->input('navbar_color');
        $setting->sidebar_color = $request->input('sidebar_color');
        $setting->skin = $request->input('skin');
        $setting->save();

        return back()->with('success', 'General Settings Updated!');
    }

    public function updateBranding(ImageUploadRequest $request)
    {
        $setting = Setting::getSettings();

        $setting->site_name = $request->input('site_name', 'IMS');
        $setting->footer_text = $request->input('footer_text');

        $setting = $request->handleImages($setting, 600, 'logo', 'settings/', 'logo');

        // clear current logo
        if ($request->input('remove_logo') == '1') {
            Storage::disk('public')->delete('settings/' . $setting->logo);
            $setting->logo = null;
        }

        $setting = $request->handleImages($setting, 36, 'favicon', 'settings/', 'favicon');

        // clear current favicon
        if ($request->input('remove_favicon') == '1') {
            Storage::disk('public')->delete('settings/' . $setting->favicon);
            $setting->favicon = null;
        }

        $setting = $request->handleImages($setting, 600, 'email_logo', 'settings/', 'email_logo');

        // clear current email logo
        if ($request->input('remove_email_logo') == '1') {
            Storage::disk('public')->delete('settings/' . $setting->email_logo);
            $setting->email_logo = null;
        }

        $setting->save();

        return back()->with('success', 'Branding Settings Updated!');
    }

    public function updateSecurity(Request $request)
    {
        dd($request->all());
    }

    public function updateLocalization(Request $request)
    {
        $setting = Setting::getSettings();
        $setting->date_format = $request->input('date_format');
        $setting->time_format = $request->input('time_format');
        $setting->currency = $request->input('currency', '$');
        $setting->save();

        return back()->with('success', 'Localization Settings Updated!');
    }
}
