@extends('layouts.admin')
@section('title', 'Edit Category')
@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">Edit Category</h2>
    <p class="text-gray-500 text-sm mt-1"><a href="{{ route('admin.product-categories.index') }}" class="text-accent hover:underline">Categories</a> / {{ $productCategory->name }}</p>
</div>

<div class="bg-white rounded-xl shadow-sm border p-8 max-w-2xl">
    <form action="{{ route('admin.product-categories.update', $productCategory) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1">Category Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $productCategory->name) }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none">
            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1">Description</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none">{{ old('description', $productCategory->description) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Category Image</label>
            @if($productCategory->image)
            <div class="mb-3 relative group w-fit">
                <img src="{{ asset('storage/'.$productCategory->image) }}" class="h-20 w-20 object-cover rounded-lg border">
                <label class="absolute -top-2 -right-2 bg-red-500 text-white p-1 rounded-full cursor-pointer shadow-lg hover:bg-red-600 transition-colors" title="Remove image">
                    <input type="checkbox" name="remove_image" value="1" class="hidden peer">
                    <svg class="h-4 w-4 peer-checked:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    <svg class="h-4 w-4 hidden peer-checked:block text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                </label>
            </div>
            @endif
            <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-accent file:text-white hover:file:bg-yellow-600">
            <p class="text-xs text-gray-400 mt-1">Upload a new image to replace the current one. Max 2MB.</p>
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1">Display Order</label>
            <input type="number" name="order" value="{{ old('order', $productCategory->order) }}" class="w-32 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none">
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-accent text-white font-bold rounded-lg shadow hover:bg-yellow-600 transition">Update Category</button>
            <a href="{{ route('admin.product-categories.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
