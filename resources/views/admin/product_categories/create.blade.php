@extends('layouts.admin')
@section('title', 'Add Category')
@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">Add Product Category</h2>
    <p class="text-gray-500 text-sm mt-1"><a href="{{ route('admin.product-categories.index') }}" class="text-accent hover:underline">Categories</a> / New</p>
</div>

<div class="bg-white rounded-xl shadow-sm border p-8 max-w-2xl">
    <form action="{{ route('admin.product-categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1">Category Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none" placeholder="e.g. Hollow Blocks">
            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1">Description</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none" placeholder="Optional short description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1">Category Image</label>
            <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-accent file:text-white hover:file:bg-yellow-600">
            <p class="text-xs text-gray-400 mt-1">PNG or JPG. Max 2MB.</p>
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1">Display Order</label>
            <input type="number" name="order" value="{{ old('order', 0) }}" class="w-32 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none">
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-accent text-white font-bold rounded-lg shadow hover:bg-yellow-600 transition">Save Category</button>
            <a href="{{ route('admin.product-categories.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
