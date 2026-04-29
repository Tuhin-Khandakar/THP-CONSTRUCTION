@extends('layouts.admin')

@section('title', 'Create New Post')

@section('content')
<div class="max-w-5xl bg-white border rounded-xl shadow-sm p-6 md:p-12">
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="md:col-span-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Post Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>
            
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Featured Image</label>
                <input type="file" name="featured_image" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>

            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Publish Date</label>
                <input type="date" name="published_at" value="{{ old('published_at') }}" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Excerpt (Short Summary)</label>
            <textarea name="excerpt" rows="3" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">{{ old('excerpt') }}</textarea>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Content (HTML allowed)</label>
            <textarea name="content" rows="12" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent font-mono">{{ old('content') }}</textarea>
        </div>

        <div class="bg-gray-50 p-8 rounded-lg border">
            <h4 class="text-sm font-bold uppercase tracking-widest text-primary mb-6">SEO Metadata</h4>
            <div class="space-y-6">
                <div>
                    <label class="text-[10px] font-bold text-gray-400 uppercase">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="w-full border px-4 py-2 mt-1 rounded outline-none focus:ring-1 focus:ring-accent">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-gray-400 uppercase">Meta Description</label>
                    <textarea name="meta_description" rows="2" class="w-full border px-4 py-2 mt-1 rounded outline-none focus:ring-1 focus:ring-accent">{{ old('meta_description') }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-8">
            <button type="submit" class="w-full sm:w-auto px-12 py-4 bg-primary text-white font-bold rounded-lg hover:bg-accent transition-colors text-center">Publish Post</button>
        </div>
    </form>
</div>
@endsection
