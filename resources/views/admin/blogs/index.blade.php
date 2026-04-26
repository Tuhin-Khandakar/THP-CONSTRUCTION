@extends('layouts.admin')

@section('title', 'Manage Blog Posts')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <p class="text-gray-500">Share construction expertise and news.</p>
    <a href="{{ route('admin.blogs.create') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-accent transition-colors w-full sm:w-auto text-center">New Post</a>
</div>

<div class="bg-white border rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left min-w-[600px]">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Post</th>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Date</th>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($blogs as $blog)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-8 py-6">
                        <div class="font-bold text-gray-900">{{ $blog->title }}</div>
                        <div class="text-xs text-gray-400">{{ $blog->slug }}</div>
                    </td>
                    <td class="px-8 py-6 text-gray-500 text-sm italic">
                        {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Draft' }}
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" onsubmit="return confirm('Delete this post?')">
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
    <div class="p-8 border-t">{{ $blogs->links() }}</div>
</div>
@endsection
