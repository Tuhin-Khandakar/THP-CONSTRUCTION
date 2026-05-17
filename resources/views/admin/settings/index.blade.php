@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">Site Settings</h2>
    <p class="text-gray-500 text-sm mt-1">Manage global settings, logos, and page content.</p>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="space-y-8">
        @foreach($settings as $group => $groupSettings)
        <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b bg-gray-50">
                <h3 class="text-lg font-bold text-primary uppercase tracking-wider">{{ ucfirst($group) }} Settings</h3>
            </div>
            <div class="p-6 space-y-6">
                @foreach($groupSettings as $setting)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                    <label class="block text-sm font-bold text-gray-700 pt-2">
                        {{ $setting->label }}
                    </label>
                    <div class="md:col-span-2">
                        @if($setting->type === 'text')
                            <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent focus:border-accent outline-none transition-all">
                        @elseif($setting->type === 'textarea')
                            <textarea name="{{ $setting->key }}" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent focus:border-accent outline-none transition-all">{{ $setting->value }}</textarea>
                        @elseif($setting->type === 'select')
                            <select name="{{ $setting->key }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent focus:border-accent outline-none transition-all">
                                <option value="1" {{ $setting->value == '1' ? 'selected' : '' }}>Enabled</option>
                                <option value="0" {{ $setting->value == '0' ? 'selected' : '' }}>Disabled</option>
                            </select>
                        @elseif($setting->type === 'image')
                            <div class="flex items-center space-x-4">
                                @if($setting->value)
                                    <div class="relative group">
                                        <div class="h-20 w-20 bg-gray-100 rounded-lg overflow-hidden border shadow-sm">
                                            <img src="{{ asset('storage/' . $setting->value) }}" class="h-full w-full object-contain">
                                        </div>
                                        <label class="absolute -top-2 -right-2 bg-red-500 text-white p-1 rounded-full cursor-pointer shadow-lg hover:bg-red-600 transition-colors" title="Remove image">
                                            <input type="checkbox" name="remove_{{ $setting->key }}" value="1" class="hidden peer">
                                            <svg class="h-3 w-3 peer-checked:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                            <svg class="h-3 w-3 hidden peer-checked:block text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                        </label>
                                    </div>
                                @endif
                                <div class="flex-grow">
                                    <input type="file" name="{{ $setting->key }}" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-accent file:text-white hover:file:bg-yellow-600 transition-all">
                                    <p class="text-xs text-gray-400 mt-1">Recommended: PNG or JPG. Max 2MB.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8 flex justify-end">
        <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-accent text-white font-bold rounded-lg shadow hover:bg-yellow-600 transition-colors text-center">
            Save All Settings
        </button>
    </div>
</form>
@endsection
