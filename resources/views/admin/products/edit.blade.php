@extends('layouts.admin')
@section('title', 'Edit Product')
@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">Edit Product</h2>
    <p class="text-gray-500 text-sm mt-1"><a href="{{ route('admin.products.index') }}" class="text-accent hover:underline">Products</a> / {{ $product->name }}</p>
</div>

<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Main Column --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-5">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Product Info</h3>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Product Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Short Description</label>
                    <input type="text" name="short_description" value="{{ old('short_description', $product->short_description) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Full Description</label>
                    <textarea name="description" rows="8" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none">{{ old('description', $product->description) }}</textarea>
                </div>
            </div>

            {{-- Existing Images --}}
            @if($product->images && count($product->images))
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Current Images</h3>
                <div class="grid grid-cols-4 gap-3">
                    @foreach($product->images as $i => $img)
                    <div class="relative group">
                        <img src="{{ asset('storage/'.$img) }}" class="h-24 w-full object-cover rounded-lg border">
                        @if($i === 0)<span class="absolute top-1 left-1 bg-accent text-white text-[9px] font-bold px-1.5 py-0.5 rounded">COVER</span>@endif
                        <label class="absolute top-1 right-1 bg-red-500 text-white rounded cursor-pointer p-1 opacity-0 group-hover:opacity-100 transition" title="Delete this image">
                            <input type="checkbox" name="delete_images[]" value="{{ $img }}" class="hidden">
                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                        </label>
                    </div>
                    @endforeach
                </div>
                <p class="text-xs text-gray-400">Hover over an image and click the ✕ to mark it for deletion.</p>
            </div>
            @endif

            {{-- Add More Images --}}
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Add More Images</h3>
                <input type="file" name="images[]" multiple accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-accent file:text-white hover:file:bg-yellow-600" id="imageInput">
                <div id="imagePreview" class="grid grid-cols-4 gap-3 mt-3"></div>
            </div>

            {{-- Video --}}
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Product Video</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">YouTube URL</label>
                        <input type="text" name="video" value="{{ old('video', $product->video) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none" placeholder="https://www.youtube.com/watch?v=...">
                        <p class="text-xs text-gray-400 mt-1">Paste a full YouTube link to embed a product demo video.</p>
                    </div>
                    
                    <div class="pt-4 border-t border-gray-100">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Upload New Video File</label>
                        <input type="file" name="video_file" accept="video/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        <p class="text-xs text-gray-400 mt-1">Max 50MB. Replaces current video file if any.</p>
                        @error('video_file')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror

                        @if($product->video_file)
                        <div class="mt-4 p-3 bg-gray-50 rounded-lg flex items-center justify-between border border-dashed">
                            <div class="flex items-center gap-3">
                                <svg class="h-8 w-8 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <div class="text-xs">
                                    <p class="font-bold text-gray-700 uppercase">Existing Video File</p>
                                    <a href="{{ asset('storage/'.$product->video_file) }}" target="_blank" class="text-accent hover:underline">View File</a>
                                </div>
                            </div>
                            <label class="flex items-center gap-2 cursor-pointer group">
                                <input type="checkbox" name="remove_video_file" value="1" class="h-4 w-4 rounded accent-red-500">
                                <span class="text-[10px] font-bold text-gray-400 group-hover:text-red-500 uppercase tracking-wider">Remove</span>
                            </label>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Publish</h3>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" value="1" {{ old('active', $product->active) ? 'checked' : '' }} class="h-4 w-4 rounded accent-yellow-500">
                    <span class="text-sm font-semibold text-gray-700">Active (visible on site)</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="hidden" name="featured" value="0">
                    <input type="checkbox" name="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }} class="h-4 w-4 rounded accent-yellow-500">
                    <span class="text-sm font-semibold text-gray-700">Featured product</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="hidden" name="in_stock" value="0">
                    <input type="checkbox" name="in_stock" value="1" {{ old('in_stock', $product->in_stock) ? 'checked' : '' }} class="h-4 w-4 rounded accent-yellow-500">
                    <span class="text-sm font-semibold text-gray-700">In stock</span>
                </label>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Display Order</label>
                    <input type="number" name="order" value="{{ old('order', $product->order) }}" class="w-24 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm">
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Category</h3>
                <select name="product_category_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm">
                    <option value="">— No Category —</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('product_category_id', $product->product_category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Pricing</h3>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Regular Price (৳)</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Sale Price (৳)</label>
                    <input type="number" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}" step="0.01" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Unit</label>
                    <input type="text" name="unit" value="{{ old('unit', $product->unit) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm">
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border p-6 space-y-4">
                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider border-b pb-3">Inventory</h3>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">SKU</label>
                    <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Stock Quantity</label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-accent outline-none text-sm">
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 py-3 bg-accent text-white font-bold rounded-lg shadow hover:bg-yellow-600 transition text-sm">Update Product</button>
                <a href="{{ route('admin.products.index') }}" class="px-4 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition text-sm">Cancel</a>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
// Image deletion checkbox visual toggle
document.querySelectorAll('input[name="delete_images[]"]').forEach(cb => {
    cb.addEventListener('change', function() {
        const img = this.closest('.relative').querySelector('img');
        img.classList.toggle('opacity-30', this.checked);
        img.classList.toggle('ring-2', this.checked);
        img.classList.toggle('ring-red-400', this.checked);
    });
});

// New image previews
document.getElementById('imageInput').addEventListener('change', function() {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    Array.from(this.files).forEach((file) => {
        const reader = new FileReader();
        reader.onload = e => {
            preview.innerHTML += `<div><img src="${e.target.result}" class="h-24 w-full object-cover rounded-lg border"></div>`;
        };
        reader.readAsDataURL(file);
    });
});
</script>
@endpush
@endsection
