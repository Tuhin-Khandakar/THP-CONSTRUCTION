@extends('layouts.app')

@section('meta_title', $blog->meta_title ?? $blog->title)
@section('meta_description', $blog->meta_description ?? $blog->excerpt)

@section('content')
<article class="pt-40 pb-32">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <header class="text-center mb-16">
            <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">Knowledge Base</span>
            <h1 class="text-4xl md:text-6xl font-heading font-black text-primary mb-8 leading-tight">{{ $blog->title }}</h1>
            <div class="flex items-center justify-center space-x-6 text-sm text-darkText/40 italic">
                <span>Published on {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Recently' }}</span>

            </div>
        </header>

        @if($blog->featured_image)
        <div class="mb-16 transform -mx-4 sm:-mx-8 lg:-mx-20">
            <img src="{{ Storage::url($blog->featured_image) }}" class="w-full h-[500px] object-cover lux-shadow" alt="{{ $blog->title }}">
        </div>
        @endif

        <div class="prose prose-lg max-w-none prose-headings:font-heading prose-headings:text-primary prose-p:text-darkText/70 prose-a:text-accent">
            {!! $blog->content !!}
        </div>

        <div class="mt-20 pt-10 border-t border-light flex justify-between items-center">
            <div class="flex space-x-4">
                <span class="text-xs font-bold uppercase tracking-widest text-primary">Share:</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="text-darkText/40 hover:text-accent transition-colors flex items-center">
                    <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    Facebook
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="text-darkText/40 hover:text-accent transition-colors flex items-center">
                    <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    LinkedIn
                </a>
            </div>
            <a href="{{ route('blog.index') }}" class="text-xs font-bold uppercase tracking-widest text-accent flex items-center">
                <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Back to Blog
            </a>
        </div>
    </div>
</article>
@endsection
