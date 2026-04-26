@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
    <div class="bg-white p-8 border rounded-xl shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-gray-800">{{ $projectCount }}</div>
        <div class="text-sm font-medium text-gray-400 uppercase tracking-widest mt-1">Total Projects</div>
    </div>

    <div class="bg-white p-8 border rounded-xl shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-amber-50 text-amber-600 rounded-lg">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-gray-800">{{ $blogCount }}</div>
        <div class="text-sm font-medium text-gray-400 uppercase tracking-widest mt-1">Blog Posts</div>
    </div>

    <div class="bg-white p-8 border rounded-xl shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-green-50 text-green-600 rounded-lg">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-gray-800">{{ $inquiryCount }}</div>
        <div class="text-sm font-medium text-gray-400 uppercase tracking-widest mt-1">Total Inquiries</div>
    </div>

    <div class="bg-white p-8 border rounded-xl shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-red-50 text-red-600 rounded-lg">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-gray-800">{{ $inquiryCount - $readInquiryCount }}</div>
        <div class="text-sm font-medium text-gray-400 uppercase tracking-widest mt-1">Unread Inquiries</div>
    </div>
</div>

<div class="bg-white border rounded-xl shadow-sm overflow-hidden">
    <div class="p-8 border-b flex justify-between items-center">
        <h3 class="text-lg font-bold text-primary">Recent Inquiries</h3>
        <a href="{{ route('admin.inquiries.index') }}" class="text-sm font-bold text-accent hover:underline">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Name</th>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Service</th>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Date</th>
                    <th class="px-8 py-4 text-xs font-bold uppercase tracking-widest text-gray-400">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($recentInquiries as $inquiry)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-8 py-6 font-medium text-gray-900">{{ $inquiry->name }}</td>
                    <td class="px-8 py-6 text-gray-600">{{ $inquiry->service_type ?? 'N/A' }}</td>
                    <td class="px-8 py-6 text-gray-500">{{ $inquiry->created_at->format('M d, Y h:i A') }}</td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest {{ $inquiry->read ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                            {{ $inquiry->read ? 'Read' : 'New' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
