@extends('layouts.admin')

@section('title', 'Add New Project')

@section('content')
<div class="max-w-4xl bg-white border rounded-xl shadow-sm p-6 md:p-12">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Project Title</label>
                <input type="text" name="title" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Category</label>
                <select name="category" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
                    <option value="Duplex House">Duplex House</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Interior">Interior</option>
                    <option value="Apartment Bldg">Apartment Bldg</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Area (SQFT)</label>
                <input type="text" name="area_sqft" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Status</label>
                <select name="status" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
                    <option value="completed">Completed</option>
                    <option value="ongoing">Ongoing</option>
                </select>
            </div>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Images</label>
            <input type="file" name="images[]" multiple class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Description</label>
            <textarea name="description" rows="6" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent"></textarea>
        </div>

        <div class="flex justify-end pt-8">
            <button type="submit" class="w-full sm:w-auto px-12 py-4 bg-primary text-white font-bold rounded-lg hover:bg-accent transition-colors text-center">Create Project</button>
        </div>
    </form>
</div>
@endsection
