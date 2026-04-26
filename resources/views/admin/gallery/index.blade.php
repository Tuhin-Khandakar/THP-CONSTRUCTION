@extends('layouts.admin')

@section('title', 'Gallery Management')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Gallery</h2>
        <p class="text-gray-500 text-sm mt-1">Manage photos of meetings, outings, and tours.</p>
    </div>
    <a href="{{ route('admin.gallery.create') }}" class="px-6 py-3 bg-accent text-white font-bold rounded-lg shadow hover:bg-yellow-600 transition-colors w-full sm:w-auto text-center">
        + Add Photo
    </a>
</div>

<div class="bg-white border rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left min-w-[800px]">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Image</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Title</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Category</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Order</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($items as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="h-12 w-20 object-cover rounded shadow-sm">
                    </td>
                    <td class="px-6 py-4 font-bold text-gray-800">{{ $item->title ?? 'Untitled' }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs font-bold rounded uppercase">{{ $item->category ?? 'General' }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $item->order }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.gallery.edit', $item) }}" class="text-blue-500 hover:text-blue-700 font-medium text-sm">Edit</a>
                        <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to remove this gallery item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium text-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">No gallery items found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($items->hasPages())
    <div class="px-6 py-4 border-t">
        {{ $items->links() }}
    </div>
    @endif
</div>
@endsection
