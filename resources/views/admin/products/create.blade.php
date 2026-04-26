@extends('layouts.admin')
@section('title', 'Add Product')
@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">Add New Product</h2>
    <p class="text-gray-500 text-sm mt-1"><a href="{{ route('admin.products.index') }}" class="text-accent hover:underline">Products</a> / New</p>
</div>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Main Column --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Basic Info --}}
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-5">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Product Info</h3>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Product Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none" placeholder="e.g. Hollow Block Grade A">
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Short Description</label>
                    <input type="text" name="short_description" value="{{ old('short_description') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none" placeholder="One-line summary (shown on listing cards)">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Full Description</label>
                    <textarea name="description" rows="8" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none" placeholder="Detailed product description, specs, usage instructions…">{{ old('description') }}</textarea>
                </div>
            </div>

            {{-- Images --}}
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Product Images</h3>
                <div>
                    <input type="file" name="images[]" multiple accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-accent file:text-white hover:file:bg-yellow-600" id="imageInput">
                    <p class="text-xs text-gray-400 mt-1">Select multiple images. First image will be the cover. Max 4MB each.</p>
                </div>
                <div id="imagePreview" class="grid grid-cols-4 gap-3 mt-3"></div>
            </div>

            {{-- Video --}}
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Product Video</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">YouTube URL</label>
                        <input type="text" name="video" value="{{ old('video') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none" placeholder="https://www.youtube.com/watch?v=...">
                        <p class="text-xs text-gray-400 mt-1">Paste a full YouTube link to embed a product demo video.</p>
                    </div>
                    <div class="pt-4 border-t border-gray-100">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Or Upload Video File</label>
                        <input type="file" name="video_file" accept="video/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        <p class="text-xs text-gray-400 mt-1">Supported: MP4, MOV. Max 50MB.</p>
                        @error('video_file')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar Column --}}
        <div class="space-y-6">
            {{-- Publish --}}
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Publish</h3>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" value="1" {{ old('active', 1) ? 'checked' : '' }} class="h-4 w-4 rounded accent-yellow-500">
                    <span class="text-sm font-semibold text-gray-700">Active (visible on site)</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="hidden" name="featured" value="0">
                    <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="h-4 w-4 rounded accent-yellow-500">
                    <span class="text-sm font-semibold text-gray-700">Featured product</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="hidden" name="in_stock" value="0">
                    <input type="checkbox" name="in_stock" value="1" {{ old('in_stock', 1) ? 'checked' : '' }} class="h-4 w-4 rounded accent-yellow-500">
                    <span class="text-sm font-semibold text-gray-700">In stock</span>
                </label>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Display Order</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" class="w-24 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm">
                </div>
            </div>

            {{-- Category --}}
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Category</h3>
                <select name="product_category_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm">
                    <option value="">— No Category —</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('product_category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                <a href="{{ route('admin.product-categories.create') }}" class="text-xs text-accent hover:underline">+ Add new category</a>
            </div>

            {{-- Pricing --}}
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Pricing</h3>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Regular Price (৳)</label>
                    <input type="number" name="price" value="{{ old('price') }}" step="0.01" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm" placeholder="0.00">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Sale Price (৳) <span class="text-gray-400 font-normal">optional</span></label>
                    <input type="number" name="sale_price" value="{{ old('sale_price') }}" step="0.01" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm" placeholder="0.00">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Unit</label>
                    <input type="text" name="unit" value="{{ old('unit', 'piece') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm" placeholder="piece, sqft, ton, bag…">
                </div>
            </div>

            {{-- Inventory --}}
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Inventory</h3>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">SKU <span class="text-gray-400 font-normal">optional</span></label>
                    <input type="text" name="sku" value="{{ old('sku') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm" placeholder="e.g. HB-A-001">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Stock Quantity <span class="text-gray-400 font-normal">optional</span></label>
                    <input type="number" name="stock" value="{{ old('stock') }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm" placeholder="Leave blank for unlimited">
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 py-3 bg-accent text-white font-bold rounded-lg shadow hover:bg-yellow-600 transition text-sm">Save Product</button>
                <a href="{{ route('admin.products.index') }}" class="px-4 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition text-sm">Cancel</a>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
document.getElementById('imageInput').addEventListener('change', function() {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    Array.from(this.files).forEach((file, i) => {
        const reader = new FileReader();
        reader.onload = e => {
            preview.innerHTML += `<div class="relative group"><img src="${e.target.result}" class="h-24 w-full object-cover rounded-lg border">${i===0?'<span class="absolute top-1 left-1 bg-accent text-white text-[9px] font-bold px-1.5 py-0.5 rounded">COVER</span>':''}</div>`;
        };
        reader.readAsDataURL(file);
    });
});
</script>
@endpush
@endsection
