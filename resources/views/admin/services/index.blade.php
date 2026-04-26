@extends('layouts.admin')

@section('title', 'Services Management')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Services</h2>
        <p class="text-gray-500 text-sm mt-1">Manage the services offered by your company.</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="px-6 py-3 bg-accent text-white font-bold rounded-lg shadow hover:bg-yellow-600 transition-colors w-full sm:w-auto text-center">
        + Add New Service
    </a>
</div>

<div class="bg-white border rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left min-w-[700px]">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Image/Icon</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Title</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Order</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($services as $service)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="h-12 w-12 object-cover rounded-lg">
                        @else
                            <div class="h-12 w-12 bg-gray-100 flex items-center justify-center rounded-lg text-gray-400">
                                {!! $service->icon ?? '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>' !!}
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-bold text-gray-800">{{ $service->title }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $service->order }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-500 hover:text-blue-700 font-medium text-sm">Edit</a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this service?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium text-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">No services found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t">
        {{ $services->links() }}
    </div>
</div>
@endsection
