<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::where('group', '!=', 'popup')->get()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::where('group', '!=', 'popup')->get();

        foreach ($settings as $setting) {
            /** @var \App\Models\Setting $setting */
            if ($setting->type === 'image') {
                if ($request->has('remove_' . $setting->key) && $request->get('remove_' . $setting->key) == '1') {
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                        $setting->value = null;
                        $setting->save();
                    }
                }

                if ($request->hasFile($setting->key)) {
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    $path = $request->file($setting->key)->store('settings', 'public');
                    $setting->value = $path;
                    $setting->save();
                }
            } else {
                if ($request->has($setting->key)) {
                    $setting->value = $request->get($setting->key);
                    $setting->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
