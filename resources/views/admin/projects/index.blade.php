@extends('layouts.admin')

@section('title', 'Manage Projects')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <p class="text-gray-500">View and manage all THP Construction projects.</p>
    <a href="{{ route('admin.projects.create') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-accent transition-colors w-full sm:w-auto text-center">Add Project</a>
</div>

<div class="bg-white border rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left min-w-[800px]">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Project</th>
                <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Category</th>
                <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Status</th>
                <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($projects as $project)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-8 py-6">
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded bg-gray-100 mr-4 overflow-hidden">
                            @if($project->images)
                            <img src="{{ Storage::url($project->images[0]) }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="font-bold text-gray-900">{{ $project->title }}</div>
                    </div>
                </td>
                <td class="px-8 py-6 text-gray-600">{{ $project->category }}</td>
                <td class="px-8 py-6 uppercase tracking-widest text-xs font-bold {{ $project->status == 'completed' ? 'text-green-500' : 'text-amber-500' }}">
                    {{ $project->status }}
                </td>
                <td class="px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="p-8 border-t">{{ $projects->links() }}</div>
</div>
@endsection
