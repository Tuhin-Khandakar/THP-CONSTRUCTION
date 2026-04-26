@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('content')
<div class="max-w-5xl bg-white border rounded-xl shadow-sm p-12">
    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="md:col-span-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Post Title</label>
                <input type="text" name="title" value="{{ $blog->title }}" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>
            
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Featured Image</label>
                <input type="file" name="featured_image" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
                @if($blog->featured_image)
                    <div class="relative group mt-4">
                        <img src="{{ Storage::url($blog->featured_image) }}" class="h-32 w-full object-cover rounded shadow">
                        <label class="absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full cursor-pointer shadow-lg hover:bg-red-600 transition-colors" title="Remove image">
                            <input type="checkbox" name="remove_image" value="1" class="hidden peer">
                            <svg class="h-4 w-4 peer-checked:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            <svg class="h-4 w-4 hidden peer-checked:block text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                        </label>
                    </div>
                @endif
            </div>

            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Publish Date</label>
                <input type="date" name="published_at" value="{{ $blog->published_at ? $blog->published_at->format('Y-m-d') : '' }}" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Excerpt (Short Summary)</label>
            <textarea name="excerpt" rows="3" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">{{ $blog->excerpt }}</textarea>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Content (HTML allowed)</label>
            <textarea name="content" rows="12" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent font-mono">{{ $blog->content }}</textarea>
        </div>

        <div class="bg-gray-50 p-8 rounded-lg border">
            <h4 class="text-sm font-bold uppercase tracking-widest text-primary mb-6">SEO Metadata</h4>
            <div class="space-y-6">
                <div>
                    <label class="text-[10px] font-bold text-gray-400 uppercase">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $blog->meta_title }}" class="w-full border px-4 py-2 mt-1 rounded outline-none focus:ring-1 focus:ring-accent">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-gray-400 uppercase">Meta Description</label>
                    <textarea name="meta_description" rows="2" class="w-full border px-4 py-2 mt-1 rounded outline-none focus:ring-1 focus:ring-accent">{{ $blog->meta_description }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-8">
            <button type="submit" class="px-12 py-4 bg-primary text-white font-bold rounded-lg hover:bg-accent transition-colors">Update Post</button>
        </div>
    </form>
</div>
@endsection
