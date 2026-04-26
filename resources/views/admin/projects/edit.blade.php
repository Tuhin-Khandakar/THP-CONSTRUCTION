@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
<div class="max-w-4xl bg-white border rounded-xl shadow-sm p-12">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Project Title</label>
                <input type="text" name="title" value="{{ $project->title }}" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Category</label>
                <select name="category" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
                    <option value="Duplex House" {{ $project->category == 'Duplex House' ? 'selected' : '' }}>Duplex House</option>
                    <option value="Commercial" {{ $project->category == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                    <option value="Interior" {{ $project->category == 'Interior' ? 'selected' : '' }}>Interior</option>
                    <option value="Apartment Bldg" {{ $project->category == 'Apartment Bldg' ? 'selected' : '' }}>Apartment Bldg</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Area (SQFT)</label>
                <input type="text" name="area_sqft" value="{{ $project->area_sqft }}" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Status</label>
                <select name="status" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
                    <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="ongoing" {{ $project->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                </select>
            </div>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Images (Upload new to add)</label>
            <input type="file" name="images[]" multiple class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            @if($project->images)
            <div class="mt-4 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-4">
                @foreach($project->images as $img)
                <div class="relative group">
                    <img src="{{ Storage::url($img) }}" class="h-24 w-full object-cover rounded shadow">
                    <label class="absolute -top-2 -right-2 bg-red-500 text-white p-1 rounded-full cursor-pointer shadow-lg hover:bg-red-600 transition-colors">
                        <input type="checkbox" name="remove_images[]" value="{{ $img }}" class="hidden peer">
                        <svg class="h-4 w-4 peer-checked:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        <svg class="h-4 w-4 hidden peer-checked:block text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    </label>
                    <div class="text-[10px] text-red-500 mt-1 font-bold text-center opacity-0 group-hover:opacity-100 transition-opacity">Click X to remove</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Description</label>
            <textarea name="description" rows="6" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">{{ $project->description }}</textarea>
        </div>

        <div class="flex justify-end pt-8">
            <button type="submit" class="px-12 py-4 bg-primary text-white font-bold rounded-lg hover:bg-accent transition-colors">Update Project</button>
        </div>
    </form>
</div>
@endsection
