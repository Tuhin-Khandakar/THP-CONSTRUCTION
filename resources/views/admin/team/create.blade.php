@extends('layouts.admin')

@section('title', 'Add Team Member')

@section('content')
<div class="max-w-4xl bg-white border rounded-xl shadow-sm p-6 md:p-12">
    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Name</label>
                <input type="text" name="name" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Designation</label>
                <input type="text" name="designation" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Member Type</label>
                <select name="type" required class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent bg-white">
                    <option value="team">Team Member</option>
                    <option value="trustee">Trustee Board</option>
                </select>
            </div>
            <div>
                <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Photo</label>
                <input type="file" name="photo" accept="image/*" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            </div>
        </div>
        
        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Display Order</label>
            <input type="number" name="order" value="0" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent">
            <p class="text-xs text-gray-500 mt-2">Lower numbers show up first.</p>
        </div>

        <div>
            <label class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 block">Details / Bio</label>
            <textarea name="details" rows="6" class="w-full border px-4 py-3 rounded-lg outline-none focus:ring-2 focus:ring-accent"></textarea>
        </div>

        <div class="flex flex-col sm:flex-row justify-end pt-8 border-t gap-4">
            <a href="{{ route('admin.team.index') }}" class="px-8 py-4 text-gray-500 font-bold hover:text-gray-700 text-center">Cancel</a>
            <button type="submit" class="px-12 py-4 bg-primary text-white font-bold rounded-lg hover:bg-accent transition-colors text-center">Add Member</button>
        </div>
    </form>
</div>
@endsection
