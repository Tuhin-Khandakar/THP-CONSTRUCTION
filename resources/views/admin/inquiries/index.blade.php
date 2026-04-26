@extends('layouts.admin')

@section('title', 'Project Inquiries')

@section('content')
<div class="bg-white border rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left min-w-[900px]">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Client</th>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Phone</th>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Service</th>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Date</th>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($inquiries as $inquiry)
                <tr class="hover:bg-gray-50 transition-colors {{ $inquiry->read ? 'opacity-60' : 'bg-blue-50/30' }}">
                    <td class="px-8 py-6">
                        <div class="font-bold text-gray-900">{{ $inquiry->name }}</div>
                        <div class="text-xs text-gray-400">{{ $inquiry->email }}</div>
                    </td>
                    <td class="px-8 py-6 text-gray-600">{{ $inquiry->phone }}</td>
                    <td class="px-8 py-6 uppercase tracking-widest text-xs font-bold text-accent">{{ $inquiry->service_type }}</td>
                    <td class="px-8 py-6 text-gray-500 text-sm">{{ $inquiry->created_at->diffForHumans() }}</td>
                    <td class="px-8 py-6">
                        <div class="flex items-center space-x-4">
                            <form action="{{ route('admin.inquiries.mark-as-read', $inquiry) }}" method="POST">
                                @csrf @if(!$inquiry->read) <button type="submit" class="text-xs font-bold text-blue-600 uppercase tracking-widest">Mark Read</button> @endif
                            </form>
                            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('Delete this inquiry?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-red-500 uppercase tracking-widest">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-8 py-20 text-center text-gray-400">No inquiries found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-8 border-t">{{ $inquiries->links() }}</div>
</div>
@endsection
