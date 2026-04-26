@extends('layouts.admin')
@section('title', 'Product Categories')
@section('content')
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Product Categories</h2>
        <p class="text-gray-500 text-sm mt-1">Organise your products into categories.</p>
    </div>
    <a href="{{ route('admin.product-categories.create') }}" class="px-5 py-2 bg-accent text-white rounded-lg text-sm font-bold shadow hover:bg-yellow-600 transition w-full sm:w-auto text-center">+ Add Category</a>
</div>

@if(session('success'))
<div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl shadow-sm border overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm min-w-[600px]">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-4 text-left font-bold text-gray-600">Category</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-600">Products</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-600">Order</th>
                    <th class="px-6 py-4 text-right font-bold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($categories as $cat)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            @if($cat->image)
                            <img src="{{ asset('storage/'.$cat->image) }}" class="h-10 w-10 rounded-lg object-cover border">
                            @else
                            <div class="h-10 w-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            </div>
                            @endif
                            <div>
                                <div class="font-semibold text-gray-800">{{ $cat->name }}</div>
                                <div class="text-xs text-gray-400">{{ $cat->slug }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $cat->products_count }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $cat->order }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.product-categories.edit', $cat) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-blue-600 border border-blue-200 rounded hover:bg-blue-50 transition mr-1">Edit</a>
                        <form action="{{ route('admin.product-categories.destroy', $cat) }}" method="POST" class="inline" onsubmit="return confirm('Delete this category?')">
                            @csrf @method('DELETE')
                            <button class="px-3 py-1.5 text-xs font-semibold text-red-600 border border-red-200 rounded hover:bg-red-50 transition">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-20 text-center text-gray-400">No categories yet. <a href="{{ route('admin.product-categories.create') }}" class="text-accent font-semibold">Add one</a>.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
