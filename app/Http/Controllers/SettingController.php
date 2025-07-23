<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index()
    {
        return view('pages.setting.setting');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'site_email' => 'required|email|max:255',
            'site_phone' => 'nullable|string|max:20',
            'site_company' => 'nullable|string|max:255',
            'site_address' => 'nullable|string|max:255',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!empty($validated['site_logo']) && $request->hasFile('site_logo')) {
            $logoPath = $request->file('site_logo')->store('logos', 'public');
            $validated['site_logo'] = $logoPath;
        }

        if(!empty($validated['site_favicon']) && $request->hasFile('site_favicon')) {
            $faviconPath = $request->file('site_favicon')->store('favicons', 'public');
            $validated['site_favicon'] = $faviconPath;
        }

        try {

            foreach ($validated as $key => $value) {
                Setting::setValue($key, $value);
            }

            Alert::success('Success', 'Settings updated successfully.');

            return redirect()->back()->with('success', 'Settings updated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update settings: ' . $e->getMessage());
            Alert::error('Error', 'Failed to update settings. Please try again.');
            return redirect()->back()->with('error', 'Failed to update settings: ' . $e->getMessage());
        }
    }
}
