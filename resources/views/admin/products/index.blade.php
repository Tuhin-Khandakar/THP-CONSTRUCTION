@extends('layouts.admin')
@section('title', 'Products')
@section('content')
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Products</h2>
        <p class="text-gray-500 text-sm mt-1">Manage your product catalogue.</p>
    </div>
    <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
        <a href="{{ route('admin.product-categories.index') }}" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-50 transition text-center">Manage Categories</a>
        <a href="{{ route('admin.products.create') }}" class="px-5 py-2 bg-accent text-white rounded-lg text-sm font-bold shadow hover:bg-yellow-600 transition text-center">+ Add Product</a>
    </div>
</div>

@if(session('success'))
<div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl shadow-sm border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm min-w-[900px]">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-4 text-left font-bold text-gray-600">Product</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-600">Category</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-600">Price</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-600">Stock</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-600">Status</th>
                    <th class="px-6 py-4 text-right font-bold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($products as $product)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            @if($product->first_image)
                            <img src="{{ asset('storage/'.$product->first_image) }}" class="h-12 w-12 rounded-lg object-cover border">
                            @else
                            <div class="h-12 w-12 rounded-lg bg-gray-100 flex items-center justify-center">
                                <svg class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            @endif
                            <div>
                                <div class="font-semibold text-gray-800">{{ $product->name }}</div>
                                @if($product->sku)<div class="text-xs text-gray-400">SKU: {{ $product->sku }}</div>@endif
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $product->category->name ?? '—' }}</td>
                    <td class="px-6 py-4">
                        @if($product->price)
                            @if($product->sale_price)
                            <span class="text-accent font-bold">৳{{ number_format($product->sale_price, 0) }}</span>
                            <span class="text-gray-400 line-through ml-1">৳{{ number_format($product->price, 0) }}</span>
                            @else
                            <span class="font-semibold">৳{{ number_format($product->price, 0) }}</span>
                            @endif
                            <span class="text-gray-400 text-xs">/{{ $product->unit }}</span>
                        @else
                            <span class="text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($product->stock !== null)
                            <span class="{{ $product->in_stock ? 'text-green-600' : 'text-red-500' }} font-semibold">{{ $product->stock }}</span>
                        @else
                            <span class="{{ $product->in_stock ? 'text-green-600' : 'text-red-500' }}">{{ $product->in_stock ? 'In Stock' : 'Out of Stock' }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            @if($product->active)
                            <span class="px-2 py-1 text-xs font-bold bg-green-100 text-green-700 rounded-full">Active</span>
                            @else
                            <span class="px-2 py-1 text-xs font-bold bg-gray-100 text-gray-500 rounded-full">Hidden</span>
                            @endif
                            @if($product->featured)
                            <span class="px-2 py-1 text-xs font-bold bg-yellow-100 text-yellow-700 rounded-full">Featured</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-blue-600 border border-blue-200 rounded hover:bg-blue-50 transition mr-1">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Delete this product?')">
                            @csrf @method('DELETE')
                            <button class="px-3 py-1.5 text-xs font-semibold text-red-600 border border-red-200 rounded hover:bg-red-50 transition">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-6 py-20 text-center text-gray-400">No products yet. <a href="{{ route('admin.products.create') }}" class="text-accent font-semibold">Add your first product</a>.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($products->hasPages())
    <div class="px-6 py-4 border-t">{{ $products->links() }}</div>
    @endif
</div>
@endsection
