@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="max-w-4xl bg-white border rounded-xl shadow-sm p-12">
    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        
        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Service Title</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Icon (SVG Code)</label>
            <textarea name="icon" rows="3" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent font-mono text-sm">{{ old('icon', $service->icon) }}</textarea>
            <p class="text-xs text-gray-500 mt-2">Optional. Used if no image is uploaded.</p>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Image</label>
            @if($service->image)
                <div class="relative group mb-4 w-fit">
                    <img src="{{ asset('storage/' . $service->image) }}" class="h-32 rounded-lg object-cover">
                    <label class="absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full cursor-pointer shadow-lg hover:bg-red-600 transition-colors" title="Remove image">
                        <input type="checkbox" name="remove_image" value="1" class="hidden peer">
                        <svg class="h-4 w-4 peer-checked:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        <svg class="h-4 w-4 hidden peer-checked:block text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    </label>
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
        </div>
        
        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Display Order</label>
            <input type="number" name="order" value="{{ old('order', $service->order) }}" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            <p class="text-xs text-gray-500 mt-2">Lower numbers show up first.</p>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Description</label>
            <textarea name="description" rows="6" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="flex justify-end pt-8 border-t">
            <a href="{{ route('admin.services.index') }}" class="px-8 py-4 text-gray-500 font-bold hover:text-gray-700 mr-4">Cancel</a>
            <button type="submit" class="px-12 py-4 bg-primary text-white font-bold rounded-lg hover:bg-accent transition-colors">Update Service</button>
        </div>
    </form>
</div>
@endsection
