@extends('layouts.admin')

@section('title', 'Add New Service')

@section('content')
<div class="max-w-4xl bg-white border rounded-xl shadow-sm p-6 md:p-12">
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Service Title</label>
            <input type="text" name="title" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Icon (SVG Code)</label>
            <textarea name="icon" rows="3" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent font-mono text-sm" placeholder="<svg>...</svg>"></textarea>
            <p class="text-xs text-gray-500 mt-2">Optional. Used if no image is uploaded.</p>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Image</label>
            <input type="file" name="image" accept="image/*" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
        </div>
        
        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Display Order</label>
            <input type="number" name="order" value="0" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            <p class="text-xs text-gray-500 mt-2">Lower numbers show up first.</p>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Description</label>
            <textarea name="description" rows="6" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent"></textarea>
        </div>

        <div class="flex flex-col sm:flex-row justify-end pt-8 border-t gap-4">
            <a href="{{ route('admin.services.index') }}" class="px-8 py-4 text-gray-500 font-bold hover:text-gray-700 text-center">Cancel</a>
            <button type="submit" class="px-12 py-4 bg-primary text-white font-bold rounded-lg hover:bg-accent transition-colors text-center">Create Service</button>
        </div>
    </form>
</div>
@endsection
