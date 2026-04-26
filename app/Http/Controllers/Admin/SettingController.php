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
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::all();

        foreach ($settings as $setting) {
            if ($setting->type === 'image') {
                if ($request->has('remove_' . $setting->key) && $request->get('remove_' . $setting->key) == '1') {
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                        $setting->update(['value' => null]);
                    }
                }

                if ($request->hasFile($setting->key)) {
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    $path = $request->file($setting->key)->store('settings', 'public');
                    $setting->update(['value' => $path]);
                }
            } else {
                if ($request->has($setting->key)) {
                    $setting->update(['value' => $request->get($setting->key)]);
                }
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
