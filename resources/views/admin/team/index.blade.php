@extends('layouts.admin')

@section('title', 'Team Members Management')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Team Members</h2>
        <p class="text-gray-500 text-sm mt-1">Manage the employees and team members.</p>
    </div>
    <a href="{{ route('admin.team.create') }}" class="px-6 py-3 bg-accent text-white font-bold rounded-lg shadow hover:bg-yellow-600 transition-colors w-full sm:w-auto text-center">
        + Add Team Member
    </a>
</div>

<div class="bg-white border rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left min-w-[800px]">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Photo</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Name</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Type</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Designation</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500">Order</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($members as $member)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="h-12 w-12 object-cover rounded-full">
                        @else
                            <div class="h-12 w-12 bg-gray-100 flex items-center justify-center rounded-full text-gray-400">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-bold text-gray-800">{{ $member->name }}</td>
                    <td class="px-6 py-4 text-sm"><span class="px-2 py-1 rounded-full border {{ $member->type == 'trustee' ? 'bg-yellow-50 text-yellow-700 border-yellow-200' : 'bg-gray-50 text-gray-600 border-gray-200' }}">{{ ucfirst($member->type) }}</span></td>
                    <td class="px-6 py-4 text-gray-600">{{ $member->designation }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $member->order }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.team.edit', $member) }}" class="text-blue-500 hover:text-blue-700 font-medium text-sm">Edit</a>
                        <form action="{{ route('admin.team.destroy', $member) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to remove this team member?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium text-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">No team members found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t">
        {{ $members->links() }}
    </div>
</div>
@endsection
