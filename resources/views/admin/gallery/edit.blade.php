@extends('layouts.admin')

@section('title', 'Edit Gallery Photo')

@section('content')
<div class="max-w-4xl bg-white border rounded-xl shadow-sm p-6 md:p-12">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Edit Gallery Photo</h2>
        <p class="text-gray-500 text-sm mt-1">Update details or replace the photo.</p>
    </div>

    <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Title</label>
                <input type="text" name="title" value="{{ old('title', $gallery->title) }}" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent" placeholder="e.g. Annual Meeting 2026">
            </div>
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Category</label>
                <input type="text" name="category" value="{{ old('category', $gallery->category) }}" list="categories" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent" placeholder="e.g. Meeting, Tour, Outing">
                <datalist id="categories">
                    <option value="Meeting">
                    <option value="Tour">
                    <option value="Outing">
                    <option value="Office">
                    <option value="Construction">
                </datalist>
            </div>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Image</label>
            @if($gallery->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="h-40 w-auto object-cover rounded border">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            <p class="text-xs text-gray-500 mt-2">Leave blank to keep the current image. Recommended size: 1200x800px. Max 5MB.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Display Order</label>
                <input type="number" name="order" value="{{ old('order', $gallery->order) }}" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
                <p class="text-xs text-gray-500 mt-2">Lower numbers show up first.</p>
            </div>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Description</label>
            <textarea name="description" rows="4" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent" placeholder="Optional description for the photo...">{{ old('description', $gallery->description) }}</textarea>
        </div>

        <div class="flex flex-col sm:flex-row justify-end pt-8 border-t gap-4">
            <a href="{{ route('admin.gallery.index') }}" class="px-8 py-4 text-gray-500 font-bold hover:text-gray-700 text-center">Cancel</a>
            <button type="submit" class="px-12 py-4 bg-primary text-white font-bold rounded-lg hover:bg-accent transition-colors text-center">Update Photo</button>
        </div>
    </form>
</div>
@endsection
